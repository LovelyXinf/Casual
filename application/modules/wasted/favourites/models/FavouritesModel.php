<?php

namespace Pg\modules\favourites\models;

use Pg\modules\users\models\UsersModel;

if (!defined('FAVOURITES_TABLE')) {
    define('FAVOURITES_TABLE', DB_PREFIX . 'favourites');
}

/**
 * Favourists model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 */
class FavouritesModel extends \Model
{

    const MODULE_GID = 'favourites';

    const NOTIFICATION_GID = 'favourites_add';

    private $fields = array(
        'id',
        'id_user',
        'id_dest_user',
        'date_add',
    );
    private $fields_str;
    public $wall_events = array(
        'favourite_add' => array(
            'gid'      => 'favourite_add',
            'settings' => array(
                'join_period' => 0, // minutes, do not use
                'permissions' => array(
                    'permissions' => 3, // permissions 0 - only for me, 1 - for me and friends, 2 - for registered, 3 - for all
                    'feed'        => 1, // show favourites events in user feed
                ),
            ),
        ),
        'favourite_remove' => array(
            'gid'      => 'favourite_remove',
            'settings' => array(
                'join_period' => 0, // minutes, do not use
                'permissions' => array(
                    'permissions' => 1, // permissions 0 - only for me, 1 - for me and friends, 2 - for registered, 3 - for all
                    'feed'        => 1, // show favourites events in user feed
                ),
            ),
        ),
    );

    public function __construct()
    {
        parent::__construct();

        $this->fields_str = implode(', ', $this->fields);
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
            $e['html'] = $this->ci->view->fetch('wall_events_favourites', null, 'favourites');
            $formatted_events[$key] = $e;
        }

        return $formatted_events;
    }

    public function getSitemapUrls()
    {
        $this->ci->load->helper('seo');
        $auth = $this->ci->session->userdata('auth_type');
        $block = array(
            array(
                'name'      => l('favourites', 'favourites'),
                'link'      => rewrite_link('favourites', 'index'),
                'clickable' => $auth === 'user',
                'items'     => array(),
            ),
        );

        return $block;
    }

    public function getSitemapXmlUrls()
    {
        $this->ci->load->helper('seo');

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
            $actions = array('index', 'i_am_their_fav', 'my_favs');
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
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
            case 'i_am_their_fav':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
            case 'my_favs':
                return array(
                    'templates'   => array(),
                    'url_vars'    => array(),
                    'url_postfix' => array(
                        'page' => array('page' => 'numeric'),
                    ),
                    'optional' => array(),
                );
        }
    }

    public function bannerAvailablePages()
    {
        return array(
            array('link' => 'favourites/index', 'name' => l('favourites', 'favourites')),
        );
    }

    private function setCallback($type, $id_user, $id_dest_user)
    {
        $this->ci->load->model('favourites/models/Favourites_callbacks_model');
        $this->ci->Favourites_callbacks_model->execute_callbacks($type, $id_user, $id_dest_user);
    }

    private function delete($params)
    {
        $this->ci->db->where($params)->delete(FAVOURITES_TABLE);

        return $this->ci->db->affected_rows();
    }

    private function get($params, $page = null, $items_on_page = null, $order_by = null)
    {
        if ($this->ci->session->userdata('auth_type') == 'user') {
            $user_id = $this->ci->session->userdata('user_id');
            $this->ci->load->model('Blacklist_model');
            
            if ($blocked_ids = $this->ci->Blacklist_model->getBlockedIds($user_id)) {
                $this->ci->db->where_not_in("id_user", $blocked_ids);
                $this->ci->db->where_not_in("id_dest_user", $blocked_ids);
            }
        }

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

        return $this->ci->db->select($this->fields_str)->from(FAVOURITES_TABLE)->get()->result_array();
    }

    public function add($id_user, $id_dest_user)
    {
        $this->ci->db->ignore()->query($this->ci->db->insert_string(FAVOURITES_TABLE, [
            'id_user' => $id_user,
            'id_dest_user' => $id_dest_user,
            'date_add' => date('Y-m-d H:i:s'),
        ]));
        $this->sendNotification($id_user, $id_dest_user);
        $this->setCallback(self::NOTIFICATION_GID, $id_user, $id_dest_user);
        return true;
    }

    /**
     * Send notifications
     *
     * @param type $id_user
     * @param type $id_dest_user
     *
     * @return void
     */
    public function sendNotification($id_user, $id_dest_user)
    {
        $this->ci->load->model(['Notifications_model', 'Users_model']);
        $dest_user_data = $this->ci->Users_model->getUserById($id_dest_user);
        $user_data = $this->ci->Users_model->getUserById($id_user, true);
        $notification_data = [
            'fname' => UsersModel::formatUserName($dest_user_data),
            'user' => UsersModel::formatUserName($user_data),
            'link_1' => $user_data['link'],
            'link_2' => site_url() . 'favourites/i_am_their_fav',
            'image' => $user_data['media']['user_logo']['thumbs']['middle']
        ];
        $this->ci->Notifications_model->sendNotification($dest_user_data['email'],
            self::NOTIFICATION_GID, $notification_data, '', $dest_user_data['lang_id']);
    }

    public function remove($id_user, $id_dest_user)
    {
        $this->delete([
            'id_user' => $id_user,
            'id_dest_user' => $id_dest_user
        ]);
        $this->setCallback('favourites_remove', $id_user, $id_dest_user);
        return true;
    }

    /**
     * @param type $id_user      int
     * @param type $id_dest_user int
     * @param type $field        string, 'user' - determine if dest_user is favourite by user, 'dest_user' - if user is favourited by dest_user
     *
     * @return boolean
     */
    public function isFav($id_user, $id_dest_user)
    {
        return (bool) $this->get(array(
                'where' => array(
                    'id_user'      => $id_user,
                    'id_dest_user' => $id_dest_user,
                ),
        ));
    }

    /**
     * Return user list
     *
     * @param type    $id_user       int
     * @param type    $page          int
     * @param type    $items_on_page int
     * @param type    $order_by      array
     * @param type    $search        string
     * @param boolean $formatted     boolean
     *
     * @return type array
     */
    public function getList($id_user = null, $page = null, $items_on_page = null, $order_by = null, $search = '', $formatted = true, $incoming = false)
    {
        $list_params = $this->getListParams($id_user, $incoming);
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

    public function getListUsersIds($id_user, $incoming = false)
    {
        $list_params = $this->getListParams($id_user, $incoming);
        $list = $this->get($list_params['params']);
        $ids = array();
        foreach ($list as $list_entry) {
            $ids[] = $list_entry[$list_params['user_field']];
        }

        return $ids;
    }

    public function getListCount($id_user = null, $search = '', $incoming = false)
    {
        if ($this->ci->session->userdata('auth_type') == 'user') {
            $user_id = $this->ci->session->userdata('user_id');
            $this->ci->load->model('Blacklist_model');
            
            if ($blocked_ids = $this->ci->Blacklist_model->getBlockedIds($user_id)) {
                $this->ci->db->where_not_in("id_user", $blocked_ids);
                $this->ci->db->where_not_in("id_dest_user", $blocked_ids);
            }
        }
        
        $count = 0;
        $list_params = $this->getListParams($id_user, $incoming);
        $user_field = $list_params['user_field'];
        $params = $list_params['params'];        
        
        $list = $this->get($params);
        if (!empty($list)) {
            $user_ids = [];
            foreach ($list as $l) {
                $user_ids[$l[$user_field]] = $l[$user_field];
            }            
            $criteria = $this->getSearchCriteria($search, true);
            $this->ci->load->model('Users_model');
            $count = $this->ci->Users_model->getUsersCount($criteria, $user_ids);
            
        }        
        return $count;
    }

    private function getListParams($id_user = null, $incoming = false)
    {
        if (!$incoming) {
            $where_user_field = 'id_user';
            $result['user_field'] = 'id_dest_user';
        } else {
            $where_user_field = 'id_dest_user';
            $result['user_field'] = 'id_user';
        }
        if ($id_user) {
            $result['params']['where'][$where_user_field] = $id_user;
        }

        return $result;
    }

    private function formatList($list, $user_field = 'id_user', $search = '')
    {
        $user_ids = $users = [];
        foreach ($list as $item) {
            $user_ids[$item[$user_field]] = $item[$user_field];
        }
        $this->ci->load->model('Users_model');
        if ($user_ids) {
            $criteria = $this->getSearchCriteria($search, false);
            $users = $this->ci->Users_model->getUsersListByKey(null, null, null, $criteria, $user_ids);
        }


        foreach ($users as $key => $item) {
            if ($item['is_deleted']) {
                unset($users[$key]);
            }
        }

        foreach ($list as $key => &$item) {
            $item['user_field'] = $user_field;
            if (!empty($users[$item[$user_field]])) {
                $item['user'] = $users[$item[$user_field]];
            } else {
                unset($list[$key]);
            }
        }
        return $list;
    }

    /**
     * Search criteria
     * 
     * @param string $search
     * @return array
     */
    private function getSearchCriteria($search = '', $is_common_crt = false)
    {
        $this->ci->load->model(['Field_editor_model', 'Users_model']);
        $this->ci->Field_editor_model->initialize($this->ci->Users_model->form_editor_type);
        $criteria = ($is_common_crt === true) ? $this->ci->Users_model->getCommonCriteria([], false) : [];       
        if (!empty($search)) {
            $temp_criteria = $this->ci->Field_editor_model->returnFulltextCriteria($search);
            $criteria['fields'][] = $temp_criteria['user']['field'];
            $criteria['where_sql'][] = $temp_criteria['user']['where_sql'];
        }
        return $criteria;
    }

    /**
     *  Module category action
     *
     *  @return array
     */
    public function moduleCategoryAction()
    {
        $action = array(
            'name'   => l('favourites', 'favourites'),
            'helper' => 'favourites_button',
        );

        return $action;
    }

    public function __call($name, $args)
    {
        $methods = [
            '_banner_available_pages' => 'bannerAvailablePages',
            'get_seo_settings' => 'getSeoSettings',
            '_format_wall_events' => 'formatWallEvents',
            'get_list' => 'getList',
            'get_sitemap_urls' => 'getSitemapUrls',
            'get_list_count' => 'getListCount',
            'is_fav' => 'isFav',
            'get_list_users_ids' => 'getListUsersIds',
            'request_seo_rewrite' => 'requestSeoRewrite',
            'get_sitemap_xml_urls' => 'getSitemapXmlUrls',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
