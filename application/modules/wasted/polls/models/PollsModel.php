<?php

namespace Pg\modules\polls\models;

use Pg\libraries\EventDispatcher;
use Pg\modules\polls\models\events\EventPolls;

if (!defined('POLLS_TABLE')) {
    define('POLLS_TABLE', DB_PREFIX . 'polls');
}

if (!defined('RESPONSES_TABLE')) {
    define('RESPONSES_TABLE', DB_PREFIX . 'polls_responses');
}

if (!defined('USERS_TABLE')) {
    define('USERS_TABLE', DB_PREFIX . 'users');
}

/**
 * Poll main model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Katya Kashkova <katya@pilotgroup.net>
 *
 * @version $Revision: 2 $ $Date: 2010-04-02 15:07:07 +0300 (Ср, 02 апр 2010) $ $Author: kkashkova $
 */
class PollsModel extends \Model
{

    const MODULE_GID = 'polls';
    const DB_DATE_FORMAT = 'Y-m-d H:i:s';
    private $moderation_type         = 'polls';
    private $poll_attrs              = array(
        'id',
        'poll_type',
        'answer_type',
        'question',
        'language',
        'use_comments',
        'sorter',
        'show_results',
        'use_expiration',
        'date_start',
        'date_end',
        'status',
        'answers_data',
    );
    private $results_format_settings = array(
        'use_format' => true,
        'get_user'   => true,
    );

    // POLL

    public function formatPoll($data)
    {
        if (isset($data['question']) && is_string($data['question'])) {
            $data['question'] = @unserialize($data['question']);
        }
        if (isset($data['answers_languages']) && is_string($data['answers_languages'])) {
            $data['answers_languages'] = @unserialize($data['answers_languages']);
        }
        if (isset($data['answers_colors']) && is_string($data['answers_colors'])) {
            $data['answers_colors'] = @unserialize($data['answers_colors']);
        }
        if (isset($data['results']) && is_string($data['results'])) {
            $data['results'] = @unserialize($data['results']);
        }

        if (isset($data['date_start'])) {
            $data['date_start_tstamp'] = max(strtotime($data['date_start']), 0);
            if ($data['date_start_tstamp'] == 0) {
                $data['date_start'] = '';
            }
        }

        if (isset($data['date_end'])) {
            $data['date_end_tstamp'] = max(strtotime($data['date_end']), 0);
            if ($data['date_end_tstamp'] == 0) {
                $data['date_end'] = '';
            }
        }

        return $data;
    }

    public function validatePoll($data = [])
    {
        $return = ['data' => [], 'errors' => []];
        
        $default_lang = $this->ci->pg_language->get_default_lang_id();

        if (isset($data['language'])) {
            if (0 == $data['language']) {
                $default_lang = $this->ci->pg_language->get_default_lang_id();
            } else {
                $default_lang = $data['language'];
            }
            $return['data']['language'] = floor($data['language']);
        } 

        if (isset($data['question']) && is_array($data['question'])) {
            $question = [];
            $question['default'] = strip_tags($data['question'][$default_lang]);
            foreach ($this->ci->pg_language->languages as $lang) {
                if (!isset($lang['id']) || !$lang['name']) {
                    continue;
                }

                // If we have an answer for the language
                if (isset($data['question'][$lang['id']]) && strip_tags($data['question'][$lang['id']]) != '') {
                    $question[$lang['id']] = strip_tags($data['question'][$lang['id']]);
                } else {
                    // If we have an answer for default language
                    if (isset($data['question'][$default_lang]) && strip_tags($data['question'][$default_lang]) != '') {
                        $question[$lang['id']] = strip_tags($data['question'][$default_lang]);
                    } else {
                        // Error
                        if (isset($return['data']['language']) && $return['data']['language'] == 0) {
                            $return['errors'][] = $lang['name'] . ' ' . l('error_question_version_empty', 'polls');
                        } else {
                            $return['errors']['question'] = l('error_question_empty', 'polls');
                        }
                    }
                }
            }
            $return['data']['question'] = @serialize($question);
        }
        if (isset($data['poll_type'])) {
            $return['data']['poll_type'] = strip_tags($data['poll_type']);
        }

        if (isset($data['answer_type'])) {
            $return['data']['answer_type'] = floor($data['answer_type']);
        }

        if (isset($data['sorter'])) {
            $return['data']['sorter'] = floor($data['sorter']);
        }

        if (isset($data['show_results'])) {
            $return['data']['show_results'] = $data['show_results'] ? 1 : 0;
        }

        if (isset($data['use_comments'])) {
            $return['data']['use_comments'] = $data['use_comments'] ? 1 : 0;
        }

        if (!empty($data['date_start'])) {
            $return['data']['date_start'] = date(self::DB_DATE_FORMAT, strtotime($data['date_start']));
        }

        if (!empty($data['date_end'])) {
            $return['data']['date_end'] = date(self::DB_DATE_FORMAT, strtotime($data['date_end']));
        }

        if(isset($data['use_expiration'])) {
            $return['data']['use_expiration'] = $data['use_expiration'] ? 1 : 0;
        }

        return $return;
    }

    public function validateAnswers($data = array(), $poll_language = '')
    {
        $return = array('data' => array(), 'errors' => array(), 'info' => array());

        $languages = $this->ci->pg_language->languages;
        $current_lang = $this->ci->pg_language->current_lang_id;

        if (isset($data['answers_languages']) && is_array($data['answers_languages'])) {
            foreach ($data['answers_languages'] as $id => $value) {
                if (strip_tags($value) == '') {
                    $id_data = explode('_', $id);
                    if (count($id_data) == 2) {
                        $answer_id       = $id_data[0];
                        $answer_language = $id_data[1];
                        $lang_name       = $languages[$answer_language]['name'];


                            if (!empty($data['answers_languages'][$answer_id . '_' . $poll_language])) {
                                $answer = $data['answers_languages'][$answer_id . '_' . $poll_language];
                            } elseif(!empty($data['answers_languages'][$answer_id . '_' . $current_lang])) {
                                $answer = $data['answers_languages'][$answer_id . '_' . $current_lang];
                                $return['info'] = l('info_add_poll', 'polls');
                            } else {
                                $answer = '';
                                if ($poll_language == 0) {
                                    $return['errors'][] = l('field_answer', 'polls') . ' ' . $answer_id . '. '
                                            . $lang_name . ' ' . l('error_answer_version_empty', 'polls');
                                } else {
                                    $return['errors'] = l('field_answer', 'polls') . ' '
                                        . $answer_id . ' ' . l('error_answer_empty', 'polls');
                                }
                            }

                            $data['answers_languages'][$answer_id . '_' . $answer_language] = $answer;


                    }
                }
            }
            // Set default answers
            $default_lang = $this->ci->pg_language->get_default_lang_id();
            foreach ($data['answers_colors'] as $id => $color) {
                $data['answers_languages'][$id . '_default'] = $data['answers_languages'][$id . '_' . $default_lang];
            }
            $return['data']['answers_languages'] = @serialize($data['answers_languages']);
        }

        if (isset($data['answers_colors']) && is_array($data['answers_colors'])) {
            $return['data']['answers_colors'] = @serialize($data['answers_colors']);
        }

        return $return;
    }

    public function getPollById($id = 0)
    {
        $this->ci->db->from(POLLS_TABLE)->where("id", $id);
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return $this->format_poll($results[0]);
        }

        return array();
    }

    public function getDeniedPolls($user_id = null)
    {
        $from_cookie = array();
        $from_db     = array();
        if (isset($_COOKIE['polls']) && is_array($_COOKIE['polls'])) {
            $from_cookie = array_keys($_COOKIE['polls']);
        }
        if ($user_id) {
            $user_type = $this->ci->session->userdata("user_type");
            $results   = $this->ci->db->select('poll_id')
                            ->from(RESPONSES_TABLE)
                            ->where('user_id', $user_id)
                            ->get()->result_array();
            if (!empty($results) && is_array($results)) {
                foreach ($results as $result) {
                    $from_db[] = $result['poll_id'];
                }
            }
            $denied_poll_types = array(-1, 0, $user_type);
        } else {
            $denied_poll_types = array(-2, 0);
        }
        $results = $this->ci->db->select('id')
                        ->from(POLLS_TABLE)
                        ->where_not_in('poll_type', $denied_poll_types)
                        ->get()->result_array();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $from_db[] = $result['id'];
            }
        }

        return array_merge($from_cookie, $from_db);
    }

    /**
     * @param int $poll_id
     *
     * @return boolean
     */
    public function isExists($poll_id)
    {
        if (is_null($poll_id)) {
            return false;
        }
        $is_exists = (bool) $this->ci->db->where('id', $poll_id)
                        ->from(POLLS_TABLE)
                        ->count_all_results();

        return $is_exists;
    }

    /**
     * Returns random poll id
     * Will skip polls, passed by $user_id
     *
     * @param boolean $has_results  Show only polls with results that can be shown
     * @param int     $language
     * @param int     $user_type
     * @param array   $denied_polls Of polls id to be skipped
     *
     * @return int
     */
    public function getRandomId($has_results = null, $language = null, $user_type = null, $denied_polls = array())
    {
        $this->ci->db->select(POLLS_TABLE . '.id')
                ->from(POLLS_TABLE)
                ->where('status', 1)
                ->where('date_start < ', date('Y-m-d H:i:s', time()))
                ->where("(use_expiration = '0' OR date_end > '" . date('Y-m-d H:i:s', time()) . "')")
                ->order_by('RAND()');

        if (!is_null($language)) {
            $this->ci->db->where_in('language', array(0, $language));
        }

        if (!is_null($user_type)) {
            $this->ci->db->where_in('poll_type', array(0, 3, $user_type));
        } elseif (is_null($has_results)) {
            $this->ci->db->where_in('poll_type', array(0, 4));
        }

        if (true == $has_results) {
            $this->ci->db->where('show_results', 1);
            $this->ci->db->join(RESPONSES_TABLE, RESPONSES_TABLE . '.poll_id=' . POLLS_TABLE . '.id', 'right');
        }

        if (count($denied_polls)) {
            $this->ci->db->where_not_in(POLLS_TABLE . '.id', $denied_polls);
        }

        return $this->ci->db->get()->row('id');
    }

    /**
     * @param int $poll_id
     *
     * @return boolean
     */
    public function showResults($poll_id)
    {
        if (is_null($poll_id)) {
            return false;
        }
        $may_show = (bool) $this->ci->db->select('show_results')
                        ->from(POLLS_TABLE)
                        ->where('id', $poll_id)
                        ->get()->row('show_results');

        return $may_show;
    }

    public function savePoll($data = [])
    {
        if (isset($data['id'])) {
            $poll_id = $data['id'];
            $this->ci->db->where('id', $poll_id);
            $this->ci->db->update(POLLS_TABLE, $data);
        } else {
            $this->ci->db->insert(POLLS_TABLE, $data);
            $poll_id = $this->ci->db->insert_id();
        }

        return $poll_id;
    }

    public function deletePolls($poll_id = 0)
    {
        if (is_array($poll_id)) {
            $this->ci->db->where_in('id', $poll_id);
        } else {
            $this->ci->db->where('id', $poll_id);
        }
        $this->ci->db->delete(POLLS_TABLE);
        if (is_array($poll_id)) {
            $this->ci->db->where_in('poll_id', $poll_id);
        } else {
            $this->ci->db->where('poll_id', $poll_id);
        }
        $this->ci->db->delete(RESPONSES_TABLE);

        return;
    }

    public function activatePolls($poll_id, $status = 1)
    {
        $attrs["status"] = intval($status);
        if (is_array($poll_id)) {
            $this->ci->db->where_in('id', $poll_id);
        } else {
            $this->ci->db->where('id', $poll_id);
        }
        $this->ci->db->update(POLLS_TABLE, $attrs);
    }

    public function getPollsCount($params = array(), $filter_object_ids = null)
    {
        $this->ci->db->select("COUNT(*) AS cnt");
        $this->ci->db->from(POLLS_TABLE);
        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        if (isset($params["where_not_in"]) && is_array($params["where_not_in"]) && count($params["where_not_in"])) {
            foreach ($params["where_not_in"] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
            }
        }
        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }
        if (isset($params["like"]) && is_array($params["like"]) && count($params["like"])) {
            foreach ($params["like"] as $field => $value) {
                $this->ci->db->or_like($field, $value);
            }
        }
        if (isset($filter_object_ids) && is_array($filter_object_ids) && count($filter_object_ids)) {
            $this->ci->db->where_in("id", $filter_object_ids);
        }
        $result = $this->ci->db->get()->result();
        if (!empty($result)) {
            return intval($result[0]->cnt);
        } else {
            return 0;
        }
    }

    public function getPollsList($page = null, $items_on_page = null, $order_by = null, $params = array(), $filter_object_ids = null)
    {
        $this->ci->db->from(POLLS_TABLE);
        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        if (isset($params["where_not_in"]) && is_array($params["where_not_in"]) && count($params["where_not_in"])) {
            foreach ($params["where_not_in"] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
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
        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $field => $dir) {
                if (in_array($field, $this->poll_attrs)) {
                    $this->ci->db->order_by($field . " " . $dir);
                }
            }
        } elseif ($order_by) {
            $this->ci->db->order_by($order_by);
        }
        if (!is_null($page)) {
            $page = intval($page) ? intval($page) : 1;
            $this->ci->db->limit($items_on_page, $items_on_page * ($page - 1));
        }
        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            foreach ($results as $r) {
                $data[$r['id']] = $this->formatPoll($r);
            }

            return $data;
        }

        return false;
    }

    // RESPONSES

    public function validateComment($comment)
    {
        $return = array("errors" => array());
        if (isset($comment)) {
            $this->ci->load->model('moderation/models/Moderation_badwords_model');
            $bw_count = $this->ci->Moderation_badwords_model->check_badwords($this->moderation_type, $comment);
            if ($bw_count) {
                $return['errors'][] = l('error_badwords_comment', 'polls');
            }
        }

        return $return;
    }

    public function saveRespond($data = array())
    {
        $data = (array) $data;

        if (isset($data['user_id'])) {
            $this->userVoted($data['user_id']);
        }

        if (isset($data['id'])) {
            $r_id = $data['id'];
            $this->ci->db->where('id', $r_id);
            $this->ci->db->update(RESPONSES_TABLE, $data);
        } else {
            $this->ci->db->insert(RESPONSES_TABLE, $data);
            $r_id = $this->ci->db->insert_id();
        }
        $this->update_poll_stat($data['poll_id']);

        return $r_id;
    }

    public function bonusCounterCallback($counter = array())
    {
        $event_handler = EventDispatcher::getInstance();
        $event = new EventPolls();
        $event->setData($counter);
        $event_handler->dispatch('bonus_counter', $event);
    }

    public function bonusActionCallback($data = array())
    {
        $counter = array();
        if (!empty($data)) {
            $counter = $data['counter'];
            $action = $data['action'];
            $counter['is_new_counter'] = $data['is_new_counter'];
            $counter['repetition'] = $data['bonus']['repetition'];
            $counter['count'] = $counter['count'] + 1;
            $this->bonusCounterCallback($counter);
        }
    }

    public function userVoted($id = null)
    {
        if ($id) {
            $event_handler = EventDispatcher::getInstance();
            $event = new EventPolls();
            $event_data = array();
            $event_data['id'] = $id;
            $event_data['action'] = 'polls_user_voted';
            $event_data['module'] = 'polls';
            $event->setData($event_data);
            $event_handler->dispatch('polls_user_voted', $event);
        }
    }

    /**
     * Updates polls statistics
     *
     * @param int $poll_id
     */
    private function updatePollStat($poll_id)
    {
        $responds = $this->ci->db->from(RESPONSES_TABLE)
                        ->where('poll_id', $poll_id)
                        ->get()->result_array();
        $stat     = array();

        $options_count = $this->get_poll_options_count($poll_id);
        foreach ($responds as $respond) {
            for ($option_num = 1; $option_num <= $options_count; ++$option_num) {
                if (empty($stat[$option_num])) {
                    $stat[$option_num] = 0;
                }
                if(isset($respond["answer_$option_num"])) {
                    if (true == $respond["answer_$option_num"]) {
                        ++$stat[$option_num];
                    }
                }
            }
        }
        if (count($stat)) {
            $data['results']        = serialize($stat);
            $data['responds_count'] = count($responds);
            $this->ci->db->where('id', $poll_id)
                    ->update(POLLS_TABLE, $data);
        }
    }

    /**
     * @param int $poll_id
     *
     * @return int
     */
    private function getPollOptionsCount($poll_id)
    {
        $answers_languages = $this->ci->db->select('answers_languages')
                        ->from(POLLS_TABLE)
                        ->where('id', $poll_id)
                        ->get()->result_array();

        // ...find a better way
        $answers_languages = unserialize($answers_languages[0]['answers_languages']);
        for ($i = 1; $i <= 10; ++$i) {
            if (!array_key_exists($i . '_default', $answers_languages)) {
                return $i - 1;
            }
        }

        return $i;
    }

    public function getResponsesPollsIds($order_by = null, $params = array())
    {
        $this->ci->db->from(RESPONSES_TABLE);
        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        if (isset($params["where_not_in"]) && is_array($params["where_not_in"]) && count($params["where_not_in"])) {
            foreach ($params["where_not_in"] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
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
        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $field => $dir) {
                if (in_array($field, $this->poll_attrs)) {
                    $this->ci->db->order_by($field . " " . $dir);
                }
            }
        } elseif ($order_by) {
            $this->ci->db->order_by($order_by);
        }
        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            foreach ($results as $r) {
                $data[$r['poll_id']] = $r['poll_id'];
            }

            return $data;
        }

        return false;
    }

    // EXPAND TABLES

    public function expandTables($max = 10)
    {
        $this->ci->load->dbforge();
        // Answers
        $table_fields = array(
            'id'      => array(
                'type'           => 'INT',
                'constraint'     => '11',
                'null'           => false,
                'auto_increment' => true,
            ),
            'poll_id' => array(
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => false,
            ),
        );
        for ($i = 1; $i <= $max; ++$i) {
            $table_fields["answer_" . $i]              = array(
                'type' => 'TEXT',
                'null' => false,
            );
            $table_fields["answer_" . $i . "_color"]   = array(
                'type'       => 'VARCHAR',
                'constraint' => '6',
                'null'       => false,
            );
            $table_fields["answer_" . $i . "_results"] = array(
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => false,
            );
            foreach ($this->ci->pg_language->languages as $lang) {
                $table_fields["answer_" . $i . "_lang_" . $lang["id"]] = array(
                    'type' => 'TEXT',
                    'null' => false,
                );
            }
        }

        // Responses
        $table_fields = array(
            'id'      => array(
                'type'           => 'INT',
                'constraint'     => '11',
                'null'           => false,
                'auto_increment' => true,
            ),
            'poll_id' => array(
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => false,
            ),
            'user_id' => array(
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => false,
            ),
        );
        for ($i = 1; $i <= $max; ++$i) {
            $table_fields["answer_" . $i] = array(
                'type' => 'TEXT',
                'null' => false,
            );
        }
        $table_query = $this->ci->db->get(RESPONSES_TABLE);
        $fields      = $table_query->list_fields();
        $new_fields  = array();
        foreach ($table_fields as $id => $values) {
            if (!in_array($id, $fields)) {
                $new_fields[$id] = $table_fields[$id];
            }
        }
        if (count($new_fields) > 0) {
            foreach ($new_fields as $id => $field) {
                $this->ci->dbforge->add_column(RESPONSES_TABLE, array($id => $field));
            }
        }
        // Update config
        $this->ci->pg_module->set_module_config('polls', 'max_answers', $max);
    }

    // RESULTS

    public function getResultsCount($params = array())
    {
        $this->ci->db->select("COUNT(*) AS cnt");
        $this->ci->db->from(RESPONSES_TABLE);

        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            if (isset($params["where"]["user_type"])) {
                $this->ci->db->join(USERS_TABLE, USERS_TABLE . '.id = ' . RESPONSES_TABLE . '.user_id', 'left');
            }
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        if (isset($params["where_not_in"]) && is_array($params["where_not_in"]) && count($params["where_not_in"])) {
            foreach ($params["where_not_in"] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
            }
        }
        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }
        if (isset($params["like"]) && is_array($params["like"]) && count($params["like"])) {
            foreach ($params["like"] as $field => $value) {
                $this->ci->db->or_like($field, $value);
            }
        }

        $result = $this->ci->db->get()->result();

        if (!empty($result)) {
            return intval($result[0]->cnt);
        } else {
            return 0;
        }
    }

    public function getResultsList($page = null, $items_on_page = null, $order_by = null, $params = array(), $by_poll = false)
    {
        $this->ci->db->select('*,' . RESPONSES_TABLE . '.date_add as response_date');
        $this->ci->db->from(RESPONSES_TABLE);

        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            if (isset($params['where']['user_type'])) {
                $this->ci->db->join(USERS_TABLE, USERS_TABLE . '.id = ' . RESPONSES_TABLE . '.user_id', 'left');
            }
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }
        if (isset($params["where_not_in"]) && is_array($params["where_not_in"]) && count($params["where_not_in"])) {
            foreach ($params["where_not_in"] as $field => $value) {
                $this->ci->db->where_not_in($field, $value);
            }
        }
        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value, null, false);
            }
        }

        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $field => $dir) {
                $this->ci->db->order_by($field . " " . $dir);
            }
        } elseif ($order_by) {
            $this->ci->db->order_by($order_by);
        }
        if (!is_null($page)) {
            $page = intval($page) ? intval($page) : 1;
            $this->ci->db->limit($items_on_page, $items_on_page * ($page - 1));
        }

        $results = $this->ci->db->get()->result_array();

        if (!empty($results) && is_array($results)) {
            foreach ($results as $r) {
                if ($by_poll) {
                    $data[$r['poll_id']] = $r;
                } else {
                    $data[] = $r;
                }
            }
            $data = $this->formatResults($data);

            return $data;
        }

        return false;
    }

    public function formatResults($data)
    {
        if (!$this->results_format_settings['use_format']) {
            return $data;
        }

        $users_search = [];

        foreach ($data as $key => $result) {
            if ($this->results_format_settings['get_user']) {
                $users_search[] = $result["user_id"];
            }
        }

        if ($this->results_format_settings['get_user'] && !empty($users_search)) {
            $this->ci->load->model('Users_model');
            $users_data = $this->ci->Users_model->getUsersListByKey(null, null, null, [], $users_search);
            foreach ($data as $key => $result) {
                if (isset($users_data[$result['user_id']])) {
                    $data[$key]['user'] = $users_data[$result['user_id']];
                } else {
                    $data[$key]['user'] = $this->ci->Users_model->formatDefaultUser($result['user_id']);
                }
                if ($data[$key]['user']) {
                    $data[$key]['fname']     = $data[$key]['user']['fname'];
                    $data[$key]['sname']     = $data[$key]['user']['sname'];
                    $data[$key]['user_type'] = !empty($data[$key]['user']['user_type']) ? $data[$key]['user']['user_type'] : '';
                }
            }
        }

        return $data;
    }

    // SEO & SITEMAP

    public function getSeoSettings($method, $lang_id = '')
    {
        if (!empty($method)) {
            return $this->getSeoSettingsInternal($method, $lang_id);
        } else {
            $actions = array('index');
            $return  = array();
            foreach ($actions as $action) {
                $return[$action] = $this->getSeoSettingsInternal($action, $lang_id);
            }

            return $return;
        }
    }

    /**
     * Return data for rewrite seo urls (internal)
     *
     * @param string  $method  method name
     * @param integer $lang_id language identifier
     *
     * @return array
     */
    public function getSeoSettingsInternal($method, $lang_id = '')
    {
        if ($method == "index") {
            return array(
                "templates"   => array(),
                "url_vars"    => array(),
                'url_postfix' => array(),
                'optional'    => array(),
            );
        }
    }

    public function requestSeoRewrite($var_name_from, $var_name_to, $value)
    {
        return $value;
    }

    public function getSitemapXmlUrls($generate = true)
    {
        $this->ci->load->helper('seo');

        $lang_canonical = true;

        if ($this->ci->pg_module->is_module_installed('seo')) {
            $lang_canonical = $this->ci->pg_module->get_module_config('seo', 'lang_canonical');
        }
        $languages = $this->ci->pg_language->languages;
        if ($lang_canonical) {
            $default_lang_id         = $this->ci->pg_language->get_default_lang_id();
            $default_lang_code       = $this->ci->pg_language->get_lang_code_by_id($default_lang_id);
            $langs[$default_lang_id] = $default_lang_code;
        } else {
            foreach ($languages as $lang_id => $lang_data) {
                $langs[$lang_id] = $lang_data['code'];
            }
        }

        $return = array();

        $user_settings = $this->ci->pg_seo->get_settings('user', 'polls', 'index');
        if (!$user_settings['noindex']) {
            if ($generate === true) {
                $this->ci->pg_seo->set_lang_prefix('user');
                foreach ($languages as $lang_id => $lang_data) {
                    if ($this->ci->pg_language->is_active($lang_id) === true) {
                        $lang_code = $this->ci->pg_language->get_lang_code_by_id($lang_id);
                        $this->ci->pg_seo->set_lang_prefix('user', $lang_code);
                        $return[] = array(
                            "url"      => rewrite_link('polls', 'index', array(), false, $lang_code),
                            "priority" => $user_settings['priority'],
                            "page" => "view",
                        );
                    }
                }
            } else {
                $return[] = array(
                    "url"      => rewrite_link('polls', 'index', array(), false, null, $lang_canonical),
                    "priority" => $user_settings['priority'],
                    "page" => "view",
                );
            }
        }

        return $return;
    }

    public function getSitemapUrls()
    {
        $this->ci->load->helper('seo');
        $auth  = $this->ci->session->userdata("auth_type");
        $block = array();

        $block[] = array(
            "name"      => l('header_polls_results', 'polls'),
            "link"      => rewrite_link('polls', 'index'),
            "clickable" => true,
            "items"     => array(),
        );

        return $block;
    }

    // banners callback method
    public function bannerAvailablePages()
    {
        $return[] = array("link" => "polls/index", "name" => l('header_polls_results', 'polls'));

        return $return;
    }

    /**
     *  Callback languages add
     *
     *  @param integer $lang_id
     *
     *  @return void
     */
    public function langDedicateModuleCallbackAdd($lang_id = false)
    {
        if (!$lang_id) {
            return;
        }

        $this->ci->load->dbforge();
        $this->ci->dbforge->add_column(RESPONSES_TABLE, [
            'answer_' . $lang_id => ['type' => 'INT', 'constraint' => '11', 'null' => false]
        ]);
        $default_lang_id = $this->ci->pg_language->get_default_lang_id();
        if ($lang_id != $default_lang_id) {
            $this->ci->db->set('answer_' . $lang_id, 'answer_' . $default_lang_id, false);
            $this->ci->db->update(RESPONSES_TABLE);
        }

        $polls = $this->getPollsList();

        if($polls) {
            foreach ($polls as $id => $poll) {
                foreach ($poll['answers_colors'] as $key => $val) {
                    $poll['answers_languages'] = array_merge($poll['answers_languages'], [$key . '_' . $lang_id => $poll['answers_languages'][$key . '_' . $default_lang_id]]);
                }
                $questions = array_merge([$lang_id => $poll['question'][$default_lang_id]], $poll['question']);
                $this->savePoll([
                    'id' => $id,
                    'question' => $this->ci->Polls_model->validatePoll(['question' => $questions])['data']['question'],
                    'answers_languages' => $this->ci->Polls_model->validateAnswers($poll)['data']['answers_languages']
                ]);
            }
        }
    }

    /**
     *  Callback languages delete
     *
     *  @param integer $lang_id
     *
     *  @return void
     */
    public function langDedicateModuleCallbackDelete($lang_id = false)
    {
        if (!$lang_id) {
            return;
        }

        $this->ci->load->dbforge();
        $fields_exists = $this->ci->db->list_fields(RESPONSES_TABLE);
        $fields = ['answer_' . $lang_id];
        foreach ($fields as $field_name) {
            if (!in_array($field_name, $fields_exists)) {
                continue;
            }
            $this->ci->dbforge->drop_column(RESPONSES_TABLE, $field_name);
        }
        $polls = $this->getPollsList();
        foreach ($polls as $id => $poll) {
            unset($poll['question'][$lang_id]);
            foreach ($poll['answers_colors'] as $key => $val) {
                unset($poll['answers_languages'][$key . '_' . $lang_id]);
            }
            $this->savePoll([
                'id' => $id,
                'question' => $this->ci->Polls_model->validatePoll(['question' => $poll['question']])['data']['question'],
                'answers_languages' => $this->ci->Polls_model->validateAnswers($poll)['data']['answers_languages']
            ]);
        }
    }

    public function __call($name, $args)
    {
        $methods = [
            '_banner_available_pages' => 'bannerAvailablePages',
            'get_seo_settings' => 'getSeoSettings',
            'activate_polls' => 'activatePolls',
            'delete_polls' => 'deletePolls',
            'expand_tables' => 'expandTables',
            'format_poll' => 'formatPoll',
            'format_results' => 'formatResults',
            'get_denied_polls' => 'getDeniedPolls',
            'get_poll_by_id' => 'getPollById',
            'get_poll_options_count' => 'getPollOptionsCount',
            'get_polls_count' => 'getPollsCount',
            'get_polls_list' => 'getPollsList',
            'get_random_id' => 'getRandomId',
            'get_responses_polls_ids' => 'getResponsesPollsIds',
            'get_results_count' => 'getResultsCount',
            'get_results_list' => 'getResultsList',
            'get_sitemap_urls' => 'getSitemapUrls',
            'get_sitemap_xml_urls' => 'getSitemapXmlUrls',
            'is_exists' => 'isExists',
            'request_seo_rewrite' => 'requestSeoRewrite',
            'save_poll' => 'savePoll',
            'save_respond' => 'saveRespond',
            'show_results' => 'showResults',
            'update_poll_stat' => 'updatePollStat',
            'validate_answers' => 'validateAnswers',
            'validate_comment' => 'validateComment',
            'validate_poll' => 'validatePoll',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
