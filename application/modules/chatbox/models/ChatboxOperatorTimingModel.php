<?php

namespace Pg\modules\chatbox\models;

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Messaging Center module
 * Operator timing model
 *
 * @package     PG_Dating
 * @subpackage  Chatbox
 * @category    models
 * @copyright   Pilot Group <http://www.pilotgroup.net/>
 * @author      Renat Gabdrakhmanov <renatgab@pilotgroup.eu>
 */
class ChatboxOperatorTimingModel extends \Model
{
    const MODULE_GID      = 'chatbox';
    const TABLE           = DB_PREFIX . 'chatbox_operator_timing';
    const DB_DATE_FORMAT  = 'Y-m-d H:i:s';
    const DB_DEFAULT_DATE = '0000-00-00 00:00:00';

    protected $fields = [
        'id',
        'operator_id',
        'date_start',
        'date_end',
        'chat_time',
        'messages_count',
        'average_answer_time',
    ];
    protected $format_settings = [
        'get_operator' => false,
    ];

    public $update_interval = 60;

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
                $return['errors'][] = l('error_empty_operator', self::MODULE_GID);
            }
        }

        if (array_key_exists('date_start', $data)) {
            $return['data']['date_start'] = date(self::DB_DATE_FORMAT, strtotime($data['date_start']));
        }

        if (array_key_exists('date_end', $data)) {
            $return['data']['date_end'] = date(self::DB_DATE_FORMAT, strtotime($data['date_end']));
        }

        if (array_key_exists('chat_time', $data)) {
            $return['data']['chat_time'] = intval($data['chat_time']);
        }

        if (array_key_exists('messages_count', $data)) {
            $return['data']['messages_count'] = intval($data['messages_count']);
        }

        if (array_key_exists('average_answer_time', $data)) {
            $return['data']['average_answer_time'] = (int) $data['average_answer_time'];
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

        foreach ($data as $key => $item) {
            if (!empty($item['operator_id'])) {
                $for_operators[] = $item['operator_id'];
            }

            $item['is_live'] = 0;
            if ($item['date_end'] > date(self::DB_DATE_FORMAT, strtotime('-' . $this->update_interval . ' seconds'))) {
                $item['is_live'] = 1;
            }

            if (array_key_exists('chat_time', $item)) {
                $item['chat_time_str'] = $this->formatTime($item['chat_time']);
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

    public function update($operator_id)
    {
        $this->ci->db
            ->select(implode(', ', $this->fields))
            ->from(self::TABLE)
            ->where('operator_id', $operator_id)
            ->order_by('date_end', 'DESC')
            ->limit(1);

        $res = $this->ci->db->get()->result_array();

        $timing = false;
        if (!empty($res) && is_array($res)) {
            $timing   = $this->format($res[0]);
        }

        if (empty($timing) || empty($timing['is_live'])) {
            $this->save(null, [
                'operator_id' => $operator_id,
                'date_start'  => date(self::DB_DATE_FORMAT),
                'date_end'    => date(self::DB_DATE_FORMAT),
                'chat_time'   => 0,
            ]);
        } else {
            $date_end  = date(self::DB_DATE_FORMAT);
            $chat_time = strtotime($date_end) - strtotime($timing['date_start']);
            $this->save($timing['id'], [
                'date_end'  => $date_end,
                'chat_time' => $chat_time,
            ]);

            // remove old row with chat_time = 0 if exists
            $this->ci->db
                ->where('operator_id', $operator_id)
                ->where('chat_time', 0)
                ->delete(self::TABLE);
        }

        return true;
    }

    public function formatTime($seconds)
    {
        $return = '';

        $minutes = intval($seconds / 60);
        $hours   = intval($minutes / 60);
        $return = ($seconds - ($minutes * 60)) . l('text_s_seconds', 'start');
        $minutes = $minutes - ($hours * 60);
        if ($minutes) {
            $return = $minutes . l('text_s_minutes', 'start') . ' ' . $return;
        }
        if ($hours) {
            if (!$minutes) {
                $return = $minutes . l('text_s_minutes', 'start') . ' ' . $return;
            }
            $return = $hours . l('text_s_hours', 'start') . ' ' . $return;
        }

        return $return;
    }

    public function getFieldSumByCriteria($field_sum, $filters = [])
    {
        $params = $this->getCriteriaInternal($filters);

        $this->ci->db->select("SUM({$field_sum}) as {$field_sum}");
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
            return $results[0][$field_sum];
        }

        return 0;
    }

    public function callbackAddNewMessage($operator_id, int $answer_time = 0)
    {
        $this->ci->db
            ->select(implode(', ', $this->fields))
            ->from(self::TABLE)
            ->where('operator_id', $operator_id)
            ->order_by('date_end', 'DESC')
            ->limit(1);

        $res = $this->ci->db->get()->result_array();

        if (!empty($res) && is_array($res)) {
            $timing = current($res);
            $timing = $this->format($timing);

            if ($timing['is_live']) {
                $average_answer_time = (int) ($timing['average_answer_time'] * $timing['messages_count'] + $answer_time) / ($timing['messages_count'] + 1);

                $this->save($timing['id'], [
                    'messages_count'        => $timing['messages_count'] + 1,
                    'average_answer_time'   => $average_answer_time,
                ]);
            }

            return true;
        }

        return false;
    }
}
