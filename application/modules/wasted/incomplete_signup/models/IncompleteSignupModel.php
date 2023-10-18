<?php

namespace Pg\modules\incomplete_signup\models;

define('UNREGISTERED_TABLE', DB_PREFIX . 'unregistered');

/**
 * Incomplete_signup main model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class IncompleteSignupModel extends \Model
{
    const DB_DATE_FORMAT = 'Y-m-d H:i:s';
    const DB_DATE_FORMAT_SEARCH = 'Y-m-d H:i';
    const DB_DEFAULT_DATE = '0000-00-00 00:00:00';
    const MODULE_GID = 'incomplete_signup';

    public $fields = [
        'id',
        'email',
        'nickname',
        'user_type',
        'looking_user_type',
        'fname',
        'sname',
        'lang_id',
        'group_id',
        'user_logo',
        'id_country',
        'id_region',
        'id_city',
        'birth_date',
        'ip',
        'date_created'
    ];

    public $fields_all = [];

    public function __construct()
    {
        parent::__construct();
        if ($this->ci->pg_module->is_module_installed('couples')) {
            $this->fields = \Pg\modules\couples\models\CouplesModel::addFields(UNREGISTERED_TABLE, $this->fields);
        }
        $this->fields_all = $this->fields;
    }

    public function getUsersCount($params = [], $filter_object_ids = null)
    {
        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        if (isset($params["like"]) && is_array($params["like"]) && count($params["like"])) {
            foreach ($params["like"] as $field => $value) {
                $this->ci->db->like($field, $value);
            }
        }

        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }

        if (isset($filter_object_ids) && is_array($filter_object_ids) && count($filter_object_ids)) {
            $this->ci->db->where_in("id", $filter_object_ids);
        }
        $result = $this->ci->db->count_all_results(UNREGISTERED_TABLE);

        return $result;
    }

    public function getUnregisteredUsers($page = null, $items_on_page = null, $order_by = null, $params = [], $filter_object_ids = [])
    {
        $this->ci->db->from(UNREGISTERED_TABLE);

        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        if (isset($params["like"]) && is_array($params["like"]) && count($params["like"])) {
            foreach ($params["like"] as $field => $value) {
                $this->ci->db->like($field, $value);
            }
        }

        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }

        if (!empty($filter_object_ids) && is_array($filter_object_ids)) {
            $this->ci->db->where_in("id", $filter_object_ids);
        }

        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $field => $dir) {
                if (in_array($field, $this->fields_all) || $field == 'fields') {
                    $this->ci->db->order_by($field . " " . $dir);
                }
            }
        }

        if (!is_null($page)) {
            $page = intval($page) ? intval($page) : 1;
            $this->ci->db->limit($items_on_page, $items_on_page * ($page - 1));
        }
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return $results;
        }

        return array();
    }

    public function getUnregisteredUserById($user_id)
    {
        $result = $this->ci->db->select(implode(", ", $this->fields_all))
                ->from(UNREGISTERED_TABLE)
                ->where("id", $user_id)
                ->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result[0];
        }
    }
    
    public function validate($data)
    {
        $validate_data = $this->Users_model->validate(null, $data);
        $validate_data['data']['ip'] = $this->ci->input->ip_address();
        $validate_data['data']["lang_id"] = $this->session->userdata("lang_id");
        if (!$validate_data['data']["lang_id"]) {
            $validate_data['data']["lang_id"] = $this->pg_language->get_default_lang_id();
        }
        if (!empty($validate_data['couple'])) {
            $validate_data['data']['nickname'] .= " + " . $validate_data['couple']['data']['nickname'];
            $validate_data['data']['birth_date_couple'] = $validate_data['couple']['data']['birth_date'];
        }
        return $validate_data;
    }
    
    public function format($data)
    {
        $user_types   = $this->ci->Properties_model->getProperty('user_type', $this->ci->pg_language->current_lang_id);
        foreach ($data as $key => $user) {
            if (!empty($user['user_type'])) {
                $data[$key]['user_type_str'] = !empty($user_types['option'][$user['user_type']]) ? $user_types['option'][$user['user_type']] : '';
            }
            if (isset($user['looking_user_type']) && !empty($user['looking_user_type'])) {
                    $data[$key]['looking_user_type_str'] = !empty($user_types['option'][$user['looking_user_type']]) ? $user_types['option'][$user['looking_user_type']] : '';
            }
            $data[$key]['language'] = $this->pg_language->get_lang_code_by_id($user['lang_id']);
        }
        return $data;
    }

    public function checkEmailExists($email)
    {
        $this->ci->db->where('email', $email);
        $this->ci->db->select('id');

        $query = $this->ci->db->get(UNREGISTERED_TABLE);
        if ($query->num_rows() > 0) {
            return $query->row()->id;
        }

        return false;
    }

    public function saveUnregisteredUser($id, $attrs = [])
    {
        $data = [];
        foreach ($this->fields as $field) {
            if (!empty($attrs[$field])) {
                $data[$field] = $attrs[$field];
            }
        }

        if (!$id) {
            if (empty($data["date_created"])) {
                $data["date_created"] = date(self::DB_DATE_FORMAT);
            }
            $this->ci->db->insert(UNREGISTERED_TABLE, $data);
            $id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->update(UNREGISTERED_TABLE, $data);
        }
        return $id;
    }

    public function deleteUnregisteredUserByEmail($email)
    {
        $this->ci->db->where('email', $email);
        $this->db->delete(UNREGISTERED_TABLE);
    }

    public function deleteUnregisteredUserById($id)
    {
        $this->ci->db->where('id', $id);
        $this->db->delete(UNREGISTERED_TABLE);
    }

    public function __call($name, $args)
    {
        $methods = [
            'check_email_exists' => 'checkEmailExists',
            'delete_unregistered_user_by_email' => 'deleteUnregisteredUserByEmail',
            'delete_unregistered_user_by_id' => 'deleteUnregisteredUserById',
            'get_unregistered_user_by_id' => 'getUnregisteredUserById',
            'get_unregistered_users' => 'getUnregisteredUsers',
            'get_users_count' => 'getUsersCount',
            'save_unregistered_user' => 'saveUnregisteredUser',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $name);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
