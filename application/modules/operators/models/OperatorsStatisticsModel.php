<?php

namespace Pg\modules\operators\models;

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Operators module
 * Statistics model
 *
 * @package     PG_Dating
 * @subpackage  Operators
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class OperatorsStatisticsModel extends \Model
{
    const MODULE_GID            = 'operators';
    const TABLE                 = DB_PREFIX . 'operators_statistics';
    const DB_DATE_FORMAT        = 'Y-m-d H:i:s';
    const DB_DATE_SIMPLE_FORMAT = 'Y-m-d H:i';
    const DB_DEFAULT_DATE       = '0000-00-00 00:00:00';

    const TYPE_MESSAGE    = 'message';

    protected $fields = [
        'id',
        'operator_id',
        'type',
        'date_added',
        'amount',
        'data',
    ];
    protected $format_settings  = [
        'get_operator' => false,
        'get_message'  => false,
    ];

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

    public function save($id = null, $save_raw = [])
    {
        if (is_null($id)) {
            $save_raw['date_added'] = date(self::DB_DATE_FORMAT);
            $this->ci->db->insert(self::TABLE, $save_raw);
            $id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->update(self::TABLE, $save_raw);
        }
        return $id;
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
                    $params[$filter_name] = array_merge_recursive($params[$filter_name], $filter_data);
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

    public function validate($id = null, $data = [])
    {
        $return = ['errors' => [], 'data' => []];

        if (array_key_exists('operator_id', $data)) {
            $return['data']['operator_id'] = intval($data['operator_id']);
            if (empty($return['data']['operator_id'])) {
                $return['errors'][] = l('error_empty_statistic_operator', self::MODULE_GID);
            }
        }

        if (array_key_exists('type', $data)) {
            $return['data']['type'] = trim(strip_tags($data['type']));
            if (empty($return['data']['type'])) {
                $return['errors']['type'] = l('error_empty_statistic_type', self::MODULE_GID);
            }
        }

        if (array_key_exists('amount', $data)) {
            $return['data']['amount'] = floatval($data['amount']);
        }

        if (array_key_exists('data', $data)) {
            $return['data']['data'] = serialize($data['data']);
        }

        return $return;
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

        $for_operators = [];
        $for_messages  = [];

        foreach ($data as $key => $item) {
            if (!empty($item['operator_id'])) {
                $for_operators[] = $item['operator_id'];
            }

            if (!empty($item['data'])) {
                $item['data'] = unserialize($item['data']);

                if ($item['type'] == self::TYPE_MESSAGE && !empty($item['data']['message_id'])) {
                    $for_messages[] = $item['data']['message_id'];
                }
            }

            $return[$key] = $item;
        }

        if ($this->format_settings['get_operator'] && !empty($for_operators)) {
            $this->ci->load->model('Operators_model');
            $operators = $this->ci->Operators_model->getListByKey(['id' => array_unique($for_operators)]);
            $operators = $this->ci->Operators_model->formatArray($operators);
            foreach ($return as $key => $item) {
                $item['operator'] = (isset($operators[$item['operator_id']])) ? $operators[$item['operator_id']] : [];
                $return[$key]     = $item;
            }
        }

        if ($this->format_settings['get_message'] && !empty($for_messages)) {
            $this->ci->load->model('Chatbox_model');
            $messages = $this->ci->Chatbox_model->getListByKey(['id' => array_unique(array_values($for_messages))]);
            $this->ci->Chatbox_model->setFormatSettings(['get_user' => true, 'get_contact' => true]);
            $messages = $this->ci->Chatbox_model->formatArray($messages);
            $this->ci->Chatbox_model->setFormatSettings(['get_user' => false, 'get_contact' => false]);
            foreach ($return as $key => $item) {
                if ($item['type'] == self::TYPE_MESSAGE && !empty($item['data']['message_id'])) {
                    $item['message'] = (isset($messages[$item['data']['message_id']])) ? $messages[$item['data']['message_id']] : [];
                }
                $return[$key]     = $item;
            }
        }

        return $return;
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

    public function getTotalAmountByCriteria($filters = [])
    {
        $params = $this->getCriteriaInternal($filters);

        $this->ci->db->select('SUM(amount) as amount');
        $this->ci->db->from(self::TABLE);

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

        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return floatval($results[0]['amount']);
        }

        return 0;
    }

    public function add($operator_id, $type, $amount = 0, $statistic_data = [])
    {
        $validate = $this->validate(null, [
            'operator_id' => $operator_id,
            'type'        => $type,
            'amount'      => $amount,
            'data'        => $statistic_data,
        ]);
        if (empty($validate['errors'])) {
            $this->save(null, $validate['data']);
        }

        return;
    }
}
