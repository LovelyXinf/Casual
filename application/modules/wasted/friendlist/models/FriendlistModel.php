<?php

namespace Pg\modules\friendlist\models;

if (!defined('FRIENDLIST_TABLE')) {
    define('FRIENDLIST_TABLE', DB_PREFIX . 'friendlist');
}

/**
 * Friendlist model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class FriendlistModel extends \Model
{

    const MODULE_GID = 'friendlist';
    
    const FRIEND_ONLINE_LIMIT = 50;

    private $fields = array(
        'id',
        'id_user',
        'id_dest_user',
        'status',
        'date_add',
        'date_update',
        'notified',
        'comment',
    );
    private $fields_str;
    private $statuses = array(
        0  => 'request',
        1  => 'accept',
        -1 => 'decline',
    );
    private $statuses_keys;
    private $moderation_type = 'friendlist';
    public $wall_events = array(
        'friend_add' => array(
            'gid'      => 'friend_add',
            'settings' => array(
                'join_period' => 0, // minutes, do not use
                'permissions' => array(
                    'permissions' => 3, // permissions 0 - only for me, 1 - for me and friends, 2 - for registered, 3 - for all
                    'feed'        => 1, // show friends events in user feed
                ),
            ),
        ),
        'friend_del' => array(
            'gid'      => 'friend_del',
            'settings' => array(
                'join_period' => 0, // minutes, do not use
                'permissions' => array(
                    'permissions' => 1, // permissions 0 - only for me, 1 - for me and friends, 2 - for registered, 3 - for all
                    'feed'        => 1, // show friends events in user feed
                ),
            ),
        ),
    );

    public function __construct()
    {
        parent::__construct();

        $this->fields_str = implode(', ', $this->fields);
        $this->statuses_keys = array_flip($this->statuses);
    }

    private function createWallEvent($gid, $id_wall, $id_poster, $id_object)
    {
        $this->ci->load->helper('wall_events_default');
        $data['id_dest_user'] = $id_object;
        $result = add_wall_event($gid, $id_wall, $id_poster, $data, $id_object);
    }

    public function formatWallEvents($events)
    {
        $formatted_events = array();
        $users_ids = array();
        foreach ($events as $key => $e) {
            foreach ($e['data'] as $e_data) {
                $users_ids[$e_data['id_dest_user']] = $e_data['id_dest_user'];
            }
        }
        $this->ci->load->model('Users_model');
        if ($users_ids) {
            $users = $this->ci->Users_model->get_users_list_by_key(null, null, null, array(), $users_ids);
        }
        $users[0] = $this->ci->Users_model->format_default_user(1);

        foreach ($events as $key => $e) {
            $this->ci->view->assign('users', $users);
            $this->ci->view->assign('event', $e);
            $e['html'] = $this->ci->view->fetch('wall_events_friendlist', null, 'friendlist');
            $formatted_events[$key] = $e;
        }

        return $formatted_events;
    }

    public function getSitemapUrls()
    {
        $this->ci->load->helper('seo');
        $auth = $this->ci->session->userdata('auth_type');
        $clickable = $auth === 'user';

        return array(
            array(
                'name'      => l('friendlist', 'friendlist'),
                'link'      => rewrite_link('friendlist', 'index'),
                'clickable' => $clickable,
                'items'     => array(
                    array(
                        'name'      => l('friends_requests', 'friendlist'),
                        'link'      => rewrite_link('friendlist', 'friends_requests'),
                        'clickable' => $clickable,
                    ),
                    array(
                        'name'      => l('friends_invites', 'friendlist'),
                        'link'      => rewrite_link('friendlist', 'friends_invites'),
                        'clickable' => $clickable,
                    ),
                ),
            ),
        );
    }

    public function getSitemapXmlUrls()
    {
        return array();
    }

    public function requestSeoRewrite($var_name_from, $var_name_to, $value)
    {
        if ($var_name_from == $var_name_to) {
            return $value;
        }
    }

    public function getSeoSettings($method = '', $lang_id = '')
    {
        if (!empty($method)) {
            return $this->getSeoSettingsInternal($method, $lang_id);
        } else {
            $actions = array('index', 'friends_requests', 'friends_invites');
            $return = array();
            foreach ($actions as $action) {
                $return[$action] = $this->getSeoSettingsInternal($action, $lang_id);
            }

            return $return;
        }
    }

    public function getSeoSettingsInternal($method, $lang_id = '')
    {
        switch ($method) {
            case 'index':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'action' => array('action' => 'literal'),
                        'page'   => array('page'   => 'numeric'),
                    ),
                );
            case 'friends_requests':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'action' => array('action' => 'literal'),
                        'page'   => array('page'   => 'numeric'),
                    ),
                );
            case 'friends_invites':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'action' => array('action' => 'literal'),
                        'page'   => array('page'   => 'numeric'),
                    ),
                );
        }
    }

    public function bannerAvailablePages()
    {
        $return = array(
            array('link' => 'friendlist/index', 'name' => l('friendlist', 'friendlist')),
            array('link' => 'friendlist/friends_requests', 'name' => l('friends_requests', 'friendlist')),
            array('link' => 'friendlist/friends_invites', 'name' => l('friends_invites', 'friendlist')),
        );

        return $return;
    }

    private function setStatus($status, $id_user, $id_dest_user, $comment = '', $notified = 1)
    {
        $params_ins['status'] = $status;
        $params_ins['id_user'] = $id_user;
        $params_ins['id_dest_user'] = $id_dest_user;
        $params_ins['comment'] = $comment;
        $params_ins['notified'] = $notified;
        $params_ins['date_add'] = $params_ins['date_update'] = $date_update = date('Y-m-d H:i:s');
        $sql = $this->ci->db->insert_string(FRIENDLIST_TABLE, $params_ins) . ' ON DUPLICATE KEY UPDATE '
            . "`status` = '{$status}', `date_update` = '{$date_update}', `notified` = '{$notified}'";
        $this->ci->db->query($sql);
        $result = $this->ci->db->affected_rows();
        $this->setCallback($this->statuses[$status], $id_user, $id_dest_user);

        return $result;
    }

    private function setCallback($status, $id_user, $id_dest_user)
    {
        $this->ci->load->model('friendlist/models/Friendlist_callbacks_model');
        $this->ci->Friendlist_callbacks_model->execute_callbacks($status, $id_user, $id_dest_user);
    }

    private function delete($params)
    {
        $this->ci->db->where($params)->delete(FRIENDLIST_TABLE);

        return $this->ci->db->affected_rows();
    }

    private function get($params, $page = null, $items_on_page = null, $order_by = null)
    {
        if (!empty($params['where']) && is_array($params['where'])) {
            $this->ci->db->where($params['where']);
        }

        if (!empty($params['where_in']) && is_array($params['where_in'])) {
            foreach ($params['where_in'] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (is_array($order_by) && count($order_by)) {
            foreach ($order_by as $field => $dir) {
                if (in_array($field, $this->fields)) {
                    $this->ci->db->order_by($field, $dir);
                }
            }
        }

        if (!is_null($page) && !is_null($items_on_page)) {
            $page = intval($page) > 0 ? intval($page) : 1;
            $this->ci->db->limit($items_on_page, $items_on_page * ($page - 1));
        }

        $result = $this->ci->db->select($this->fields_str)->from(FRIENDLIST_TABLE)->get()->result_array();
        foreach ($result as &$list) {
            $list['status_text'] = $this->statuses[$list['status']];
        }

        return $result;
    }

    public function backendGetRequestNotifications()
    {
        $user_id = $this->ci->session->userdata("user_id");
        $params['where']['id_dest_user'] = $user_id;
        $params['where']['status'] = 0;
        $requests = $this->formatList($this->get($params), 'id_user');
        $this->ci->load->helper('seo_helper');
        $result = array();
        $notify = false;
        foreach ($requests as $request) {
            $link = rewrite_link('users', 'view', $request['user']);
            $result[] = array(
                'title'     => l('notify_request_title', 'friendlist'),
                'text'      => str_replace('[user]', "<a href=\"{$link}\">{$request['user']['output_name']}</a>", l('notify_request_text', 'friendlist')) . '&nbsp;<br>' . $request['comment'],
                'id'        => $request['id'],
                'notified'  => $request['notified'],
                'comment'   => $request['comment'],
                'user_id'   => $request['user']['id'],
                'user_name' => $request['user']['output_name'],
                'user_icon' => $request['user']['media']['user_logo']['thumbs']['small'],
                'user_link' => $link,
            );
            if (empty($request['notified'])) {
                $notify = true;
            }
        }
        if ($notify) {
            $params['where']['notified'] = 0;
            $this->ci->db->set('notified', '1')->where($params['where'])->update(FRIENDLIST_TABLE);
        }

        return ['friends' => $result];
    }

    public function backendGetAcceptNotifications()
    {
        $user_id = intval($this->ci->session->userdata("user_id"));
        $params['where']['id_user'] = $user_id;
        $params['where']['status'] = 1;
        $requests = $this->formatList($this->get($params), 'id_dest_user');
        $this->ci->load->helper('seo_helper');
        $result = array();
        $notify = false;
        foreach ($requests as $request) {
            $link = rewrite_link('users', 'view', $request['user']);
            $result[] = array(
                'title'     => l('notify_accept_title', 'friendlist'),
                'text'      => str_replace('[user]', "<a href=\"{$link}\">{$request['user']['output_name']}</a>", l('notify_accept_text', 'friendlist')),
                'id'        => $request['id'],
                'notified'  => $request['notified'],
                'comment'   => $request['comment'],
                'user_id'   => $request['user']['id'],
                'user_name' => $request['user']['output_name'],
                'user_icon' => $request['user']['media']['user_logo']['thumbs']['small'],
                'user_link' => $link,
            );
            if (empty($request['notified'])) {
                $notify = true;
            }
        }
        if ($notify) {
            $params['where']['notified'] = 0;
            $this->ci->db->set('notified', '1')->where($params['where'])->update(FRIENDLIST_TABLE);
        }

        return array('friends' => $result);
    }

    public function getStatuses($id_user, $id_dest_user)
    {
        $params['where']['id_user'] = $id_user;
        $params['where']['id_dest_user'] = $id_dest_user;
        $user = $this->get($params);
        $params['where']['id_user'] = $id_dest_user;
        $params['where']['id_dest_user'] = $id_user;
        $dest_user = $this->get($params);
        $result['user'] = !empty($user[0]) ? $user[0] : array();
        $result['dest_user'] = !empty($dest_user[0]) ? $dest_user[0] : array();

        $result['can_request'] = true;
        $result['can_set_friend'] = false;
        $result['allowed_btns'] = array(
            'request'           => array('method' => 'request', 'allow' => true, 'icon' => 'user', 'icon_stack' => 'plus'),
            'accept'            => array('method' => 'accept', 'allow' => false, 'icon' => 'ok'),
            'decline'           => array('method' => 'decline', 'allow' => false, 'icon' => 'remove'),
            'remove_friendlist' => array('method' => 'remove', 'allow' => false, 'icon' => 'user', 'icon_stack' => 'remove'),
            'remove_request'    => array('method' => 'remove', 'allow' => false, 'icon' => 'user', 'icon_stack' => 'remove'),
        );

        // destination user in lists of user
        if (isset($result['user']['status']) && $result['user']['status_text'] !== 'decline') {
            $result['can_request'] = false;
        }
        // dest user already send request
        if (isset($result['dest_user']['status']) && $result['dest_user']['status_text'] === 'request') {
            $result['allowed_btns']['accept']['allow'] = true;
            $result['allowed_btns']['decline']['allow'] = true;
            $result['allowed_btns']['request']['allow'] = false;
        }

        // user already send request and awaiting answer
        if (isset($result['user']['status']) && $result['user']['status_text'] === 'request') {
            $result['allowed_btns']['request']['allow'] = false;
            $result['allowed_btns']['remove_request']['allow'] = true;
        }
        // dest user already friend
        if (isset($result['user']['status']) && $result['user']['status_text'] === 'accept') {
            $result['allowed_btns']['request']['allow'] = false;
            $result['allowed_btns']['remove_friendlist']['allow'] = true;
        }

        return $result;
    }

    public function request($id_user, $id_dest_user, $comment = '')
    {
        $result = ['success' => '', 'errors' => ''];
        $comment = mb_substr($comment, 0, $this->ci->pg_module->get_module_config('friendlist', 'request_max_chars'), 'UTF-8');
        if ($comment) {
            $this->ci->load->model('moderation/models/Moderation_badwords_model');
            $bw_count = $this->ci->Moderation_badwords_model->checkBadwords($this->moderation_type, $comment);
            if ($bw_count) {
                $result['errors'][] = l('error_badwords_comment', 'friendlist');

                return $result;
            }
        }
        $statuses = $this->getStatuses($id_user, $id_dest_user);
        if ($statuses['can_request']) {
            if (!empty($statuses['dest_user'])) {
                $this->setStatus($this->statuses_keys['accept'], $id_user, $id_dest_user);
                $this->setStatus($this->statuses_keys['accept'], $id_dest_user, $id_user);
                $result['success'] = l('friends_request_accept', 'friendlist');
                $this->createWallEvent('friend_add', $id_user, $id_user, $id_dest_user);
                $this->createWallEvent('friend_add', $id_dest_user, $id_dest_user, $id_user);
            } else {
                $this->setStatus($this->statuses_keys['request'], $id_user, $id_dest_user, $comment, 0);

                // Network event
                if ($this->ci->pg_module->is_module_installed('network')) {
                    $this->ci->load->model('network/models/Network_events_model');
                    $this->ci->Network_events_model->emit('friend_request', array(
                        'id_user' => (int) $id_user,
                        'id_to'   => (int) $id_dest_user,
                        'comment' => (string) $comment,
                    ));
                }

                $result['success'] = l('friends_request_send', 'friendlist');
            }
        } elseif ($comment && isset($statuses['user']['status']) && $statuses['user']['status_text'] === 'request') {
            $this->setStatus($this->statuses_keys['request'], $id_user, $id_dest_user, $comment);
        } else {
            $result['errors'] = 'Cant send request';
        }

        return $result;
    }

    public function accept($id_user, $id_dest_user)
    {
        $statuses = $this->get_statuses($id_user, $id_dest_user);
        $result['success'] = '';
        $result['errors'] = '';
        if (!empty($statuses['dest_user']) && $statuses['dest_user']['status_text'] === 'request') {
            $this->setStatus($this->statuses_keys['accept'], $id_user, $id_dest_user);
            $this->setStatus($this->statuses_keys['accept'], $id_dest_user, $id_user, '', 0);
            $result['success'] = l('friends_request_accept', 'friendlist');
            $this->createWallEvent('friend_add', $id_user, $id_user, $id_dest_user);
            $this->createWallEvent('friend_add', $id_dest_user, $id_dest_user, $id_user);

            // Network event
            if ($this->ci->pg_module->is_module_installed('network')) {
                $this->ci->load->model('network/models/Network_events_model');
                $this->ci->Network_events_model->emit('friend_response', array(
                    'id_user' => (int) $id_user,
                    'id_to'   => (int) $id_dest_user,
                    'status'  => $this->statuses_keys['accept'],
                ));
            }
        } else {
            $result['errors'] = 'Can\'t accept';
        }

        return $result;
    }

    public function decline($id_user, $id_dest_user)
    {
        $statuses = $this->get_statuses($id_user, $id_dest_user);
        $result['success'] = '';
        $result['errors'] = '';
        if (!empty($statuses['dest_user']) && $statuses['dest_user']['status_text'] === 'request') {
            $this->setStatus($this->statuses_keys['decline'], $id_dest_user, $id_user);
            $this->delete(array('id_user' => $id_user, 'id_dest_user' => $id_dest_user));

            // Network event
            if ($this->ci->pg_module->is_module_installed('network')) {
                $this->ci->load->model('network/models/Network_events_model');
                $this->ci->Network_events_model->emit('friend_response', array(
                    'id_user' => (int) $id_user,
                    'id_to'   => (int) $id_dest_user,
                    'status'  => $this->statuses_keys['decline'],
                ));
            }

            $result['success'] = l('friends_request_decline', 'friendlist');
        } else {
            $result['errors'] = 'Can\'t decline';
        }

        return $result;
    }

    public function remove($id_user, $id_dest_user)
    {
        $statuses = $this->get_statuses($id_user, $id_dest_user);
        $result['success'] = '';
        $result['errors'] = '';
        $this->delete(array('id_user' => $id_user, 'id_dest_user' => $id_dest_user));
        if (!empty($statuses['dest_user'])) {
            $this->delete(array('id_user' => $id_dest_user, 'id_dest_user' => $id_user));
            $this->createWallEvent('friend_del', $id_user, $id_user, $id_dest_user);
            $this->createWallEvent('friend_del', $id_dest_user, $id_dest_user, $id_user);

            // Network event
            if ($this->ci->pg_module->is_module_installed('network')) {
                $this->ci->load->model('network/models/Network_events_model');
                $this->ci->Network_events_model->emit('friend_remove', array(
                    'id_user' => (int) $id_user,
                    'id_to'   => (int) $id_dest_user,
                ));
            }
        }
        $result['redirect'] = '';
        if (!empty($statuses['user']['status_text']) && $statuses['user']['status_text'] === 'request') {
            $result['redirect'] = 'friends_invites';
        }

        $result['success'] = l('friends_request_remove', 'friendlist');
        $this->setCallback('remove', $id_user, $id_dest_user);

        return $result;
    }

    /**
     * @param type $id_user      int
     * @param type $id_dest_user int
     * @param type $field        string, 'user' - determine if dest_user is a friend of user, 'dest_user' - if user is a friend of dest_user
     *
     * @return boolean
     */
    public function isFriend($id_user, $id_dest_user, $field = 'user')
    {
        $statuses = $this->get_statuses($id_user, $id_dest_user);
        if (!empty($statuses[$field]) && $statuses[$field]['status_text'] === 'accept') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Return user list by type (accept, decline, request_in, request_out)
     *
     * @param type    $id_user       int
     * @param type    $type          string
     * @param type    $page          int
     * @param type    $items_on_page int
     * @param type    $order_by      array
     * @param type    $search        string
     * @param boolean $formatted     boolean
     *
     * @return type array
     */
    public function getList($id_user = null, $type = 'accept', $page = null, $items_on_page = null, $order_by = null, $search = '', $formatted = true)
    {
        $list_params = $this->getListParams($id_user, $type);
        if ($search) {
            $list = $this->get($list_params['params'], null, null, $order_by);
            $formatted = true;
        } else {
            $list = $this->get($list_params['params'], $page, $items_on_page, $order_by);
        }

        if ($formatted) {
            $list = $this->formatList($list, $list_params['user_field'], $search);
            if ($search && $page && $items_on_page) {
                $list = array_slice($list, ($page - 1) * $items_on_page, $items_on_page);
            }
        }

        return $list;
    }

    /**
     * Synonym for get_list type = accept
     */
    public function getFriendlist($id_user = null, $page = null, $items_on_page = null, $order_by = null, $search = '', $formatted = true)
    {
        return $this->get_list($id_user, 'accept', $page, $items_on_page, $order_by, $search, $formatted);
    }

    public function getFriendlistCount($id_user = null, $search = '')
    {
        return $this->get_list_count($id_user, 'accept', $search);
    }

    public function getListUsersIds($id_user, $type = 'accept')
    {
        $list_params = $this->getListParams($id_user, $type);
        $list = $this->get($list_params['params']);
        $ids = array();
        foreach ($list as $list_entry) {
            $ids[] = $list_entry[$list_params['user_field']];
        }

        return $ids;
    }

    public function getFriendlistUsersIds($id_user)
    {
        return $this->getListUsersIds($id_user, 'accept');
    }

    public function getListCount($id_user = null, $type = 'accept', $search = '')
    {
        $count = 0;
        $list_params = $this->getListParams($id_user, $type);
        $user_field = $list_params['user_field'];
        $params = $list_params['params'];
        if ($search) {
            $list = $this->get($params);
            $user_ids = array();
            foreach ($list as $key => $l) {
                $user_ids[$l[$user_field]] = $l[$user_field];
            }
            if ($user_ids) {
                $criteria = $this->getSearchCriteria($search);
                $this->ci->load->model('Users_model');
                $count = $this->ci->Users_model->get_users_count($criteria, $user_ids);
            }
        } else {
            if (!empty($params['where']) && is_array($params['where'])) {
                $this->ci->db->where($params['where']);
            }
            if (!empty($params['where_in']) && is_array($params['where_in'])) {
                foreach ($params['where_in'] as $field => $value) {
                    $this->ci->db->where_in($field, $value);
                }
            }
            $count = $this->ci->db->count_all_results(FRIENDLIST_TABLE);
        }

        return intval($count);
    }

    private function getListParams($id_user = null, $type = 'accept')
    {
        $result = array();
        switch ($type) {
            case 'request_in':
                $result['params']['where']['status'] = $this->statuses_keys['request'];
                $result['user_field'] = 'id_user';
                $where_user_field = 'id_dest_user';
                break;
            case 'request_out':
                $result['params']['where_in']['status'] = array($this->statuses_keys['request'], $this->statuses_keys['decline']);
                $result['user_field'] = 'id_dest_user';
                $where_user_field = 'id_user';
                break;
            case 'decline':
                $result['params']['where']['status'] = $this->statuses_keys['decline'];
                $result['user_field'] = 'id_user';
                $where_user_field = 'id_dest_user';
                break;
            case 'accept':
            default:
                $result['params']['where']['status'] = $this->statuses_keys['accept'];
                $result['user_field'] = 'id_dest_user';
                $where_user_field = 'id_user';
                break;
        }
        if ($id_user) {
            $result['params']['where'][$where_user_field] = $id_user;
        }

        return $result;
    }

    private function formatList($list, $user_field = 'id_user', $search = '')
    {
        $user_ids = $users = array();
        foreach ($list as $key => $l) {
            $user_ids[$l[$user_field]] = $l[$user_field];
        }
        $this->ci->load->model('Users_model');
        if ($user_ids) {
            $criteria = $search ? $this->getSearchCriteria($search) : array();
            $users = $this->ci->Users_model->get_users_list_by_key(null, null, null, $criteria, $user_ids);
        }
        $users[0] = $this->ci->Users_model->format_default_user(1);
        foreach ($list as $key => &$l) {
            $l['user_field'] = $user_field;
            if (!empty($users[$l[$user_field]])) {
                $l['user'] = $users[$l[$user_field]];
            } elseif ($search) {
                unset($list[$key]);
            } else {
                $l['user'] = $users[0];
                $l['user']['id'] = $l[$user_field];
            }
        }

        return $list;
    }

    private function getSearchCriteria($search)
    {
        $search = trim(strip_tags($search));
        $this->ci->load->model('Users_model');
        $this->ci->load->model('Field_editor_model');
        $this->ci->Field_editor_model->initialize($this->ci->Users_model->form_editor_type);
        $temp_criteria = $this->ci->Field_editor_model->return_fulltext_criteria($search);
        $criteria['fields'][] = $temp_criteria['user']['field'];
        $criteria['where_sql'][] = $temp_criteria['user']['where_sql'];

        return $criteria;
    }

    public function handlerFriendRequest($data)
    {
        return $this->request($data['id_user'], $data['id_to'], $data['comment']);
    }

    public function handlerFriendResponse($data)
    {
        if ($data['status'] == $this->statuses_keys['accept']) {
            return $this->accept($data['id_user'], $data['id_to']);
        } elseif ($data['status'] == $this->statuses_keys['decline']) {
            return $this->decline($data['id_user'], $data['id_to']);
        }
    }

    public function handlerFriendRemove($data)
    {
        return $this->remove($data['id_user'], $data['id_to']);
    }

    /**
     *  Module category action
     *
     *  @return array
     */
    public function moduleCategoryAction()
    {
        $action = array(
            'name'   => l('action_request', 'friendlist'),
            'helper' => 'friendlist_links',
        );

        return $action;
    }

     public function callbackUserDelete($id_user)
    {
         $this->delete(['id_user' => $id_user, 'status' => 0]);
    }

    public function __call($name, $args)
    {
        $methods = [
            '_banner_available_pages' => 'bannerAvailablePages',
            '_format_wall_events' => 'formatWallEvents',
            'get_seo_settings' => 'getSeoSettings',
            'backend_get_accept_notifications' => 'backendGetAcceptNotifications',
            'backend_get_request_notifications' => 'backendGetRequestNotifications',
            'get_friendlist' => 'getFriendlist',
            'get_friendlist_count' => 'getFriendlistCount',
            'get_friendlist_users_ids' => 'getFriendlistUsersIds',
            'get_list' => 'getList',
            'get_list_count' => 'getListCount',
            'get_list_users_ids' => 'getListUsersIds',
            'get_sitemap_urls' => 'getSitemapUrls',
            'is_friend' => 'isFriend',
            'get_sitemap_xml_urls' => 'getSitemapXmlUrls',
            'get_statuses' => 'getStatuses',
            'handler_friend_remove' => 'handlerFriendRemove',
            'handler_friend_request' => 'handlerFriendRequest',
            'handler_friend_response' => 'handlerFriendResponse',
            'request_seo_rewrite' => 'requestSeoRewrite',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
