<?php

namespace Pg\modules\operators\models;

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Operators module
 * Main model
 *
 * @package     PG_Dating
 * @subpackage  Operators
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class OperatorsModel extends \Model
{
    const MODULE_GID            = 'operators';
    const TABLE                 = DB_PREFIX . 'operators';
    const DB_DATE_FORMAT        = 'Y-m-d H:i:s';
    const DB_DATE_FORMAT_SEARCH = 'Y-m-d H:i';
    const DB_DEFAULT_DATE       = '0000-00-00 00:00:00';

    protected $fields = [
        'id',
        'nickname',
        'email',
        'password',
        'name',
        'description',
        'is_active',
        'is_online',
        'to_logout_by_admin',
        'lang_id',
        'account',
        'date_created',
        'date_modified',
        'date_last_activity',
        'date_last_login',
        'last_connect_ip',
        'message_cost',
        'domain_id',
        'search_field',
    ];

    protected $format_settings = [];
    protected $fields_all      = [];
    protected $dop_fields      = [];

    public $form_editor_type   = 'operators';

    public function __construct()
    {
        parent::__construct();
        $this->fields_all = $this->fields;
    }

    public function setAdditionalFields($fields)
    {
        $this->dop_fields = $fields;
        $this->fields_all = (!empty($this->dop_fields))
            ? array_merge($this->fields, $this->dop_fields)
            : $this->fields;
        return;
    }

    protected function getObject($data = [])
    {
        $fields     = $this->fields_all;
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

    public function getByLoginPassword($login, $password)
    {
        $operator = $this->getObject(['nickname' => $login]);

        if (!empty($operator) && password_verify($password, $operator['password']) === true) {
            return $operator;
        }

        return false;
    }

    public function getByLogin($login)
    {
        return $this->getObject(['nickname' => $login]);
    }

    public function getByEmailPassword($email, $password)
    {
        $operator = $this->getObject(['email' => $email]);

        if (!empty($operator) && password_verify($password, $operator['password']) === true) {
            return $operator;
        }

        return false;
    }

    public function getByEmail($email)
    {
        return $this->getObject(['email' => $email]);
    }

    protected function getCriteriaInternal($filters)
    {
        $filters = ['data' => $filters, 'table' => self::TABLE, 'type' => ''];

        $params = [];

        $params['table'] = !empty($filters['table']) ? $filters['table'] : self::TABLE;

        $fields = array_flip($this->fields_all);
        foreach ($filters['data'] as $filter_name => $filter_data) {
            if (!is_array($filter_data)) {
                $filter_data = trim($filter_data);
            }
            switch ($filter_name) {
                case 'domain_id':
                    if (empty($filter_data)) {
                        break;
                    }

                    if (is_string($filter_data)) {
                        $filter_data = explode(',', $filter_data);
                    }

                    $d_criteria = [];
                    foreach ($filter_data as $d_id) {
                        $d_criteria[] = "domain_id LIKE '%[{$d_id}]%'";
                    }

                    $params['where_sql'][] = '(' . implode(' OR ', $d_criteria) . ')';
                    break;
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
        $fields     = $this->fields_all;

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
                if (in_array($field, $this->fields_all)) {
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

        foreach ($data as $key => $item) {
            $item['output_name'] = ($item['name'] != '') ? $item['name'] : $item['nickname'];

            if (!empty($item['domain_id'])) {
                if (is_string($item['domain_id'])) {
                    $item['domain_id'] = explode(',', $item['domain_id']);
                }
                foreach ($item['domain_id'] as $d_key => $d_id) {
                    $d_id = str_replace(['[', ']'], '', $d_id);
                    $item['domain_id'][$d_key] = $d_id;
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

        if (array_key_exists('to_logout_by_admin', $data)) {
            $return['data']['to_logout_by_admin'] = intval($data['to_logout_by_admin']) ? 1 : 0;
        }

        if (array_key_exists('account', $data)) {
            $return['data']['account'] = floatval($data['account']);
        }

        if (array_key_exists('message_cost', $data)) {
            $return['data']['message_cost'] = floatval($data['message_cost']);
        }

        if (array_key_exists('domain_id', $data)) {
            if (is_string($data['domain_id'])) {
                $data['domain_id'] = explode(',', $data['domain_id']);
            }

            $domain_id  = [];
            if (!empty($data['domain_id'])) {
                foreach ($data['domain_id'] as $d_id) {
                    $domain_id[] = '[' . $d_id . ']';
                }

                $return['data']['domain_id'] = implode(',', $domain_id);
            } else {
                $return['errors']['domain_id'] = l('error_domain_id_empty', self::MODULE_GID);
            }
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
        $save_raw['date_modified'] = date(self::DB_DATE_FORMAT);
        if (empty($id)) {
            if (empty($save_raw['date_created'])) {
                $save_raw['date_created'] = $save_raw['date_modified'];
            }
            $this->ci->db->insert(self::TABLE, $save_raw);
            $id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->update(self::TABLE, $save_raw);
        }

        $this->ci->load->model('Field_editor_model');
        $this->ci->Field_editor_model->initialize($this->form_editor_type);
        $this->ci->Field_editor_model->updateFulltextField($id);

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

            $this->ci->load->model('chatbox/models/Chatbox_dealer_model');
            $this->ci->Chatbox_dealer_model->callbackOperatorOnlineStatus($id, 0);
        }
    }

    public function setActivityStatus($id, $status = 1)
    {
        $save_raw = [
            'is_active' => intval($status) ? 1 : 0,
        ];

        return $this->save($id, $save_raw);
    }

    public function updateOnlineStatus($id, $status)
    {
        $operator = $this->getById($id);

        $status = intval($status);
        $save_raw = [
            'is_online' => $status ? 1 : 0,
        ];
        if ($status) {
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP')) {
                $ipaddress = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_X_FORWARDED')) {
                $ipaddress = getenv('HTTP_X_FORWARDED');
            } elseif (getenv('HTTP_FORWARDED_FOR')) {
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            } elseif (getenv('HTTP_FORWARDED')) {
                $ipaddress = getenv('HTTP_FORWARDED');
            } elseif (getenv('REMOTE_ADDR')) {
                $ipaddress = getenv('REMOTE_ADDR');
            }

            $save_raw['date_last_activity'] = date(self::DB_DATE_FORMAT);
            $save_raw['last_connect_ip']    = $ipaddress;

            if (!$operator['is_online']) {
                $save_raw['date_last_login'] = date(self::DB_DATE_FORMAT);
            }
        }

        $this->ci->db->where('id', $id)
            ->update(self::TABLE, $save_raw);

        if ($operator['is_online'] != $status) {
            $this->ci->load->model('chatbox/models/Chatbox_dealer_model');
            $this->ci->Chatbox_dealer_model->callbackOperatorOnlineStatus($id, $status);
        }
    }

    public function cronSetOfflineStatus()
    {
        $set_offline_interval = 600; // seconds

        $operators = $this->getList([
            'is_online' => 1,
            'where'     => [
                'date_last_activity <'  => date(self::DB_DATE_FORMAT_SEARCH, time() - $set_offline_interval),
                'date_last_activity !=' => self::DB_DEFAULT_DATE,
            ],
        ]);

        if (!empty($operators)) {
            $this->ci->load->model('chatbox/models/Chatbox_dealer_model');

            foreach ($operators as $operator) {
                $this->ci->db->where('id', $operator['id']);
                $this->ci->db->update(self::TABLE, ['is_online' => 0]);

                $this->ci->Chatbox_dealer_model->callbackOperatorOnlineStatus($operator['id'], 0);
            }
        }
    }

    public function getFulltextData($id, $fields)
    {
        $return = [
            'main_fields'     => [],
            'fe_fields'       => [],
            'default_lang_id' => $this->ci->pg_language->get_default_lang_id(),
            'object_lang_id'  => 1
        ];

        $this->setAdditionalFields($fields);
        $operator                 = $this->getById($id);
        $return['object_lang_id'] = $operator['lang_id'];
        $return['main_fields']    = [
            'name'     => $operator['name'],
            'nickname' => $operator['nickname'],
        ];

        foreach ($fields as $field) {
            $return['fe_fields'][$field] = $operator[$field];
        }

        return $return;
    }

    public function addMoneyToAccount($id, $amount)
    {
        $operator   = $this->getById($id);

        if (!empty($amount) && !empty($operator)) {
            $account = $operator['account'] + $amount;
            $this->save($id, ['account' => $account]);

            return $account;
        }

        return false;
    }

    public function withdrawMoneyFromAccount($id, $amount)
    {
        $operator   = $this->getById($id);

        if (!empty($amount) && !empty($operator)) {
            $account = $operator['account'] - $amount;
            if ($account < 0) {
                $account = 0;
            }
            $this->save($id, ['account' => $account]);

            return $account;
        }

        return false;
    }

    public function backendBalance($data = [])
    {
        if ($this->ci->session->userdata('auth_type') != 'operator') {
            return [];
        }

        $id = intval($this->ci->session->userdata('user_id'));
        $operator = $this->getById($id);

        $this->ci->load->helper('start');
        return [
            'account'      => $operator['account'],
            'account_html' => currency_format_output(['value' => $operator['account'], 'no_tags' => true, 'not_virtual' => true]),
        ];
    }
}
