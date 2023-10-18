<?php

namespace Pg\modules\users\models;

if (!defined('USERS_STATUSES_CALLBACKS_TABLE')) {
    define('USERS_STATUSES_CALLBACKS_TABLE', DB_PREFIX . 'users_statuses_callbacks');
}

/**
 * Users statuses model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Dmitry Popenov
 *
 * @version $Revision: 2 $ $Date: 2013-01-30 10:07:07 +0400 $
 */
class UsersStatusesModel extends \Model
{
    private $fields = array(
        'id',
        'module',
        'model',
        'method',
        'event_status',
        'date_add',
    );
    private $fields_str;

    public $statuses = array(
        0 => 'offline',
        1 => 'online',
    );
    private $statuses_keys;

    public function __construct()
    {
        parent::__construct();

        $this->fields_str = implode(', ', $this->fields);
        $this->statuses_keys = array_flip($this->statuses);
    }

    public function setStatus($user_id, $status)
    {
        if (isset($this->statuses[$status])) {
            $attrs['site_status'] = (int)$status;
            $this->ci->load->model('Users_model');
            $is_updated = $this->ci->Users_model->simplyUpdateUser($user_id, $attrs);
            $event_status = $this->statuses[$status];
            if ($is_updated) {
                $this->executeCallbacks($event_status, $user_id);
            }
            return true;
        }
        return false;
    }

    public function addCallback($module, $model, $method, $event_status = '')
    {
        $attrs = array(
            'module'       => $module,
            'model'        => $model,
            'method'       => $method,
            'event_status' => $event_status,
            'date_add'     => date("Y-m-d H:i:s"),
        );
        $this->ci->db
            ->insert(USERS_STATUSES_CALLBACKS_TABLE, $attrs);
        return $this->ci->db->affected_rows();
    }

    public function deleteCallbacksByModule($module)
    {
        $this->ci->db
            ->where('module', $module)
            ->delete(USERS_STATUSES_CALLBACKS_TABLE);
        return $this->ci->db->affected_rows();
    }

    public function deleteCallbacksById($id)
    {
        $this->ci->db
            ->where('id', $id)
            ->delete(USERS_STATUSES_CALLBACKS_TABLE);
        return $this->ci->db->affected_rows();
    }

    public function getCallbacks($event_status = '', $module = '')
    {
        if ($module) {
            $this->ci->db->where('module', $module);
        }
        if ($event_status) {
            $this->ci->db->where_in('event_status', array('', $event_status));
        }

        return $this->ci->db
            ->select($this->fields_str)
            ->from(USERS_STATUSES_CALLBACKS_TABLE)
            ->get()->result_array();
    }

    public function executeCallbacks($event_status, $user_id, $module = '')
    {
        $cbs = $this->get_callbacks($event_status, $module);
        foreach ($cbs as $cb) {
            $model_name = $cb['module'] . '_' . $cb['model'];
            $method_name = $cb['method'];

            if (!$this->ci->pg_module->is_module_installed($cb['module'])) {
                continue;
            }

            $this->ci->load->model($cb['module'] . '/models/' . $cb['model'], $model_name, false, true, true);

            // TODO: убрать после приведения к PSR
            if (!method_exists($this->ci->$model_name, $method_name)) {
                $chunks = explode('_', $method_name);
                $method_name = array_shift($chunks);
                foreach ($chunks as $chunk) {
                    $method_name .= ucfirst($chunk);
                }

                if (!method_exists($this->ci->$model_name, $method_name)) {
                    continue;
                }
            }

            try {
                $this->ci->$model_name->$method_name($this->statuses_keys[$event_status], (array) $user_id);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    public function getUserStatuses($id)
    {
        $status = $this->getUsersStatuses($id);

        return !empty($status[$id]) ? $status[$id] : array();
    }

    public function getUsersStatuses($ids)
    {
        if (!is_array($ids) && (int)$ids) {
            $ids = array((int)$ids);
        } else {
            return array();
        }
        $this->ci->load->model('Users_model');
        $users = $this->ci->Users_model->getUsersListByKey(null, null, null, array(), $ids, false);
        $result = array();
        foreach ($users as $uid => $user) {
            $result[$uid] = $this->formatStatus($user['online_status'], $user['site_status']);
        }

        return $result;
    }

    public function formatStatus($online_status, $site_status)
    {
        $current_site_status = $online_status ? $site_status : 0;

        return [
            'online_status' => $online_status,
            'site_status' => $site_status,
            'online_status_text' => $online_status ? 'online' : 'offline',
            'current_site_status' => $current_site_status,
            'site_status_text' => isset($this->statuses[$site_status]) ? $this->statuses[$site_status] : '',
            'current_site_status_text' => isset($this->statuses[$current_site_status]) ? $this->statuses[$current_site_status] : '',
            'online_status_lang' => l('status_online_' . $online_status, 'users'),
            'site_status_lang' => l('status_site_' . $site_status, 'users'),
            'current_site_status_lang' => l('status_site_' . $current_site_status, 'users'),
        ];
    }

    public function __call($name, $args)
    {
        $methods = [
            'add_callback' => 'addCallback',
            'delete_callbacks_by_id' => 'deleteCallbacksById',
            'delete_callbacks_by_module' => 'deleteCallbacksByModule',
            'execute_callbacks' => 'executeCallbacks',
            'format_status' => 'formatStatus',
            'get_callbacks' => 'getCallbacks',
            'get_user_statuses' => 'getUserStatuses',
            'get_users_statuses' => 'getUsersStatuses',
            'set_status' => 'setStatus',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $name);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
