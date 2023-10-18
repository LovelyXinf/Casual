<?php

namespace Pg\modules\chatbox\models;

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Chatbox module
 * API users model
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class ChatboxApiUsersModel extends \Model
{
    const MODULE_GID            = 'chatbox';
    const TABLE                 = DB_PREFIX . 'chatbox_api_users';
    const DB_DATE_TIME_FORMAT   = 'Y-m-d H:i:s';
    const DB_DATE_TIME_DEFAULT  = '0000-00-00 00:00:00';

    protected $fields = [
        'id',
        'domain_id',
        'user_id',
        'is_fake',
        'nickname',
        'fname',
        'sname',
        'email',
        'user_type',
        'user_logo',
        'date_modified',
    ];

    protected $format_settings = [];

    public function __construct()
    {
        parent::__construct();
    }

    protected function getObject($data = [])
    {
        $fields     = $this->fields;
        $fields_str = implode(', ', $fields);

        $this->ci->db->select($fields_str)
            ->from(self::TABLE);

        foreach ($data as $field => $value) {
            $this->ci->db->where($field, $value);
        }

        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            return $results[0];
        }

        return false;
    }

    public function getById($id)
    {
        return $this->getObject(['id' => $id]);
    }

    public function getByDomainIdAndUserId($domain_id, $user_id)
    {
        return $this->getObject(['domain_id' => $domain_id, 'user_id' => $user_id]);
    }

    protected function getCriteriaInternal($filters)
    {
        $filters = ['data' => $filters, 'table' => self::TABLE, 'type' => ''];

        $params = [];

        $params['table'] = !empty($filters['table']) ? $filters['table'] : self::TABLE;

        $fields = array_flip($this->fields);
        foreach ($filters['data'] as $filter_name => $filter_data) {
            if (!is_array($filter_data)) {
                $filter_data = trim($filter_data);
            }
            switch ($filter_name) {
                case 'where':
                case 'where_in':
                case 'where_not_in':
                case 'where_sql':
                    if (empty($filter_data) || !is_array($filter_data)) {
                        break;
                    }
                    if (!array_key_exists($filter_name, $params)) {
                        $params[$filter_name] = [];
                    }
                    $params[$filter_name] = array_merge_recursive($params[$filter_name], (array) $filter_data);
                    break;
                default:
                    if (isset($fields[$filter_name])) {
                        if (is_array($filter_data)) {
                            $params = array_merge_recursive($params, ['where_in' => [$filter_name => $filter_data]]);
                        } else {
                            $params = array_merge_recursive($params, ['where' => [$filter_name => $filter_data]]);
                        }
                    }
                    break;
            }
        }

        return $params;
    }

    protected function getListInternal($page = null, $limits = null, $order_by = null, $params = [])
    {
        $table      = self::TABLE;
        $fields     = $this->fields;

        $fields_str = $table . '.' . implode(', ' . $table . '.', $fields);

        $this->ci->db->select($fields_str);
        $this->ci->db->from($table);

        if (isset($params['join'])) {
            foreach ($params['join'] as $j_table => $j_sett) {
                $this->ci->db->join($j_table, $j_sett, 'left');
            }
        }

        if (isset($params['where']) && is_array($params['where']) && count($params['where'])) {
            foreach ($params['where'] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        if (isset($params['where_in']) && is_array($params['where_in']) && count($params['where_in'])) {
            foreach ($params['where_in'] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (isset($params['where_not_in']) && is_array($params['where_not_in']) && count($params['where_not_in'])) {
            foreach ($params['where_not_in'] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
            }
        }

        if (isset($params['where_sql'])) {
            if (!is_array($params['where_sql'])) {
                $params['where_sql'] = [$params['where_sql']];
            }
            foreach ($params['where_sql'] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }

        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $field => $dir) {
                if (in_array($field, $this->fields)) {
                    $this->ci->db->order_by($field . ' ' . $dir);
                } elseif ($field == 'order_str') {
                    if (is_array($dir)) {
                        foreach ($dir as $f => $d) {
                            $this->ci->db->order_by($f . ' ' . $d);
                        }
                    } else {
                        $this->ci->db->order_by($dir);
                    }
                }
            }
        } elseif ($order_by) {
            $this->ci->db->order_by($order_by);
        }

        if (!is_null($page)) {
            $page = intval($page) ? intval($page) : 1;
            $this->ci->db->limit($limits, $limits * ($page - 1));
        }

        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return $results;
        }
        return [];
    }

    protected function getCountInternal($params = null)
    {
        $table = isset($params['table']) ? $params['table'] : self::TABLE;

        $this->ci->db->select('COUNT(*) AS cnt');
        $this->ci->db->from($table);

        if (isset($params['where']) && is_array($params['where']) && count($params['where'])) {
            foreach ($params['where'] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        if (isset($params['where_in']) && is_array($params['where_in']) && count($params['where_in'])) {
            foreach ($params['where_in'] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (isset($params['where_not_in']) && is_array($params['where_not_in']) && count($params['where_not_in'])) {
            foreach ($params['where_not_in'] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
            }
        }

        if (isset($params['where_sql']) && is_array($params['where_sql']) && count($params['where_sql'])) {
            foreach ($params['where_sql'] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }

        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return intval($results[0]['cnt']);
        }
        return 0;
    }

    public function getList($filters = [], $page = null, $items_on_page = null, $order_by = null)
    {
        $params = $this->getCriteriaInternal($filters);
        return $this->getListInternal($page, $items_on_page, $order_by, $params);
    }

    public function getListByKey($filters = [], $page = null, $items_on_page = null, $order_by = null)
    {
        $return = [];

        $params = $this->getCriteriaInternal($filters);
        $list   = $this->getListInternal($page, $items_on_page, $order_by, $params);
        foreach ($list as $key => $item) {
            $return[$item['id']] = $item;
        }

        return $return;
    }

    public function getListByField($field, $filters = [], $page = null, $items_on_page = null, $order_by = null)
    {
        $return = [];

        $params = $this->getCriteriaInternal($filters);
        $list   = $this->getListInternal($page, $items_on_page, $order_by, $params);
        foreach ($list as $key => $item) {
            $return[$item[$field]] = $item;
        }

        return $return;
    }

    public function getCount($filters = [])
    {
        $params = $this->getCriteriaInternal($filters);
        return $this->getCountInternal($params);
    }

    public function setFormatSettings($name, $value = false)
    {
        if (!is_array($name)) {
            $name = [$name => $value];
        }
        foreach ($name as $key => $item) {
            $this->format_settings[$key] = $item;
        }
    }

    public function format($data)
    {
        if (empty($data) || !is_array($data)) {
            return [];
        }

        return current($this->formatArray([0 => $data]));
    }

    public function formatArray($data)
    {
        $return = [];

        if (empty($data) || !is_array($data)) {
            return [];
        }

        $this->ci->load->model('start/models/StartDomainsModel');
        $domains = [];

        foreach ($data as $key => $item) {
            $item['output_name'] = (!empty($item['fname'])) ? ($item['fname'] . ' ' . $item['sname']) : $item['nickname'];

            if (!empty($item['domain_id'])) {
                if (empty($domains[$item['domain_id']])) {
                    $domains[$item['domain_id']] = $this->ci->StartDomainsModel->getById($item['domain_id']);
                }

                $item['domain'] = $domains[$item['domain_id']]['domain'];
            }

            if (!empty($item['user_logo'])) {
                if (strpos($item['user_logo'], 'http') !== 0) {
                    $item['user_logo'] = $item['domain'] . $item['user_logo'];
                }
            }

            $return[$key] = $item;
        }

        return $return;
    }

    public function formatDefault()
    {
        $data = [];
        return $data;
    }

    public function validate($id = null, $data = [], $sections = [])
    {
        $return = ['errors' => [], 'data' => []];

        if (isset($data['id'])) {
            $return['data']['id'] = intval($data['id']);
            if (empty($return['data']['id'])) {
                unset($return['data']['id']);
            }
        }

        $this->ci->config->load('reg_exps', true);
        if (array_key_exists('nickname', $data)) {
            $login_expr                 = $this->ci->config->item('nickname', 'reg_exps');
            $return['data']['nickname'] = trim(strip_tags($data['nickname']));
            if (empty($return['data']['nickname']) || !preg_match($login_expr, $return['data']['nickname'])) {
                $return['errors']['nickname'] = l('error_nickname_incorrect', self::MODULE_GID);
            }
            $filters = [
                'nickname' => $return['data']['nickname'],
            ];
            if ($id) {
                $filters['where']['id !='] = $id;
            }
            $count = $this->getCount($filters);
            if ($count > 0) {
                $return['errors']['nickname'] = l('error_nickname_already_exists', self::MODULE_GID);
            }
        }

        if (array_key_exists('email', $data)) {
            $email_expr              = $this->ci->config->item('email', 'reg_exps');
            $return['data']['email'] = trim(strip_tags($data['email']));
            if (empty($return['data']['email']) || !preg_match($email_expr, $return['data']['email'])) {
                $return['errors']['email'] = l('error_email_incorrect', self::MODULE_GID);
            } else {
                $filters = [
                    'email' => $return['data']['email'],
                ];
                if ($id) {
                    $filters['where']['id !='] = $id;
                }
                $count = $this->getCount($filters);
                if ($count > 0) {
                    $return['errors']['email'] = l('error_email_already_exists', self::MODULE_GID);
                }
            }
        }

        if (array_key_exists('password', $data)) {
            if (empty($data['password'])) {
                $return['errors']['password'] = l('error_password_empty', self::MODULE_GID);
            } elseif ($data['password'] != $data['repassword']) {
                $return['errors']['repassword'] = l('error_pass_repass_not_equal', self::MODULE_GID);
            } else {
                $password_expr    = $this->ci->config->item('password', 'reg_exps');
                $data['password'] = trim(strip_tags($data['password']));
                if (!preg_match($password_expr, $data['password'])) {
                    $return['errors']['password'] = l('error_password_incorrect', self::MODULE_GID);
                } else {
                    $return['data']['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                }
            }
        }

        if (array_key_exists('name', $data)) {
            $return['data']['name'] = trim(strip_tags($data['name']));
        }

        if (array_key_exists('description', $data)) {
            $return['data']['description'] = trim(strip_tags($data['description']));
        }

        if (array_key_exists('is_active', $data)) {
            $return['data']['is_active'] = intval($data['is_active']) ? 1 : 0;
        }

        if (array_key_exists('lang_id', $data)) {
            $return['data']['lang_id'] = intval($data['lang_id']);
        }

        if (array_key_exists('is_online', $data)) {
            $return['data']['is_online'] = intval($data['is_online']) ? 1 : 0;
        }

        if (array_key_exists('account', $data)) {
            $return['data']['account'] = floatval($data['account']);
        }

        if (array_key_exists('date_created', $data)) {
            $value = strtotime($data['date_created']);
            if ($value > 0) {
                $return['data']['date_created'] = date(self::DB_DATE_FORMAT, $value);
            } else {
                $return['data']['date_created'] = self::DB_DEFAULT_DATE;
            }
        }

        if (array_key_exists('date_modified', $data)) {
            $value = strtotime($data['date_modified']);
            if ($value > 0) {
                $return['data']['date_modified'] = date(self::DB_DATE_FORMAT, $value);
            } else {
                $return['data']['date_modified'] = self::DB_DEFAULT_DATE;
            }
        }

        if (!empty($sections)) {
            $this->ci->load->model('Field_editor_model');
            $this->ci->Field_editor_model->initialize($this->form_editor_type);
            $validate_data  = $this->ci->Field_editor_model->validateFieldsForSelect(['where_in' => ['section_gid' => $sections]], $data);
            $return['data'] = array_merge($return['data'], $validate_data['data']);
            if (!empty($validate_data['errors'])) {
                $return['errors'] = array_merge($return['errors'], $validate_data['errors']);
            }
        }

        return $return;
    }

    public function save($id = null, $save_raw = [])
    {
        $save_raw['date_modified'] = date(self::DB_DATE_TIME_FORMAT);
        if (empty($id)) {
            $this->ci->db->insert(self::TABLE, $save_raw);
            $id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->update(self::TABLE, $save_raw);
        }

        return $id;
    }

    public function delete($id)
    {
        if (is_array($id)) {
            foreach ($id as $i) {
                $this->delete($i);
            }
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->delete(self::TABLE);
        }
    }

    public function getUser($domain_id, $user_id)
    {
        $user = $this->getByDomainIdAndUserId($domain_id, $user_id);

        if (empty($user) || $user['date_modified'] < date(self::DB_DATE_TIME_FORMAT, strtotime('-1 week'))) {
            $this->ci->load->model('chatbox/models/ChatboxApiModel');
            $result = $this->ci->ChatboxApiModel->request(
                $domain_id,
                \Pg\modules\chatbox\models\ChatboxApiModel::ACTION_USER_GET,
                [
                    'user_id'   => $user_id,
                ]
            );

            if ($result['status'] == 1 && !empty($result['data'])) {
                $user_data = $result['data'];

                $this->ci->load->model('start/models/StartDomainsModel');
                $domain     = $this->ci->StartDomainsModel->getById($domain_id);

                $save_raw = array_intersect_key($user_data, array_flip(['is_fake', 'nickname', 'fname', 'sname', 'email', 'user_type']));
                $save_raw['user_id']    = $user_data['id'];
                $save_raw['domain_id']  = $domain_id;
                $save_raw['user_logo']  = str_replace($domain['domain'], '', $user_data['media']['user_logo']['thumbs']['big']);

                $id = null;
                if (!empty($user)) {
                    $id = $user['id'];
                }
                $this->save($id, $save_raw);

                $user = $this->getByDomainIdAndUserId($domain_id, $user_id);
            }
        }

        return $user;
    }

    public function getUserFull($id)
    {
        $user = $this->getById($id);

        if (!empty($user)) {
            $this->ci->load->model('chatbox/models/ChatboxApiModel');
            $result = $this->ci->ChatboxApiModel->request(
                $user['domain_id'],
                \Pg\modules\chatbox\models\ChatboxApiModel::ACTION_USER_GET,
                [
                    'user_id'   => $user['user_id'],
                ]
            );

            if (!empty($result['status']) && !empty($result['data'])) {
                $user['info'] = $result['data'];
            } else {
                $user['info'] = [
                    'output_name'   => $user['nickname'],
                    'nickname'      => $user['nickname'],
                    'fname'         => $user['fname'],
                    'sname'         => $user['sname'],
                    'user_type'     => $user['user_type'],
                    'email'         => $user['email'],
                    'credits'       => 0,
                    'media'         => [
                        'user_logo' => [
                            'thumbs'    => [
                                'small'     => $user['user_logo'],
                                'middle'    => $user['user_logo'],
                                'big'       => $user['user_logo'],
                            ],
                        ],
                    ],
                ];
            }
        }

        return $user;
    }
}
