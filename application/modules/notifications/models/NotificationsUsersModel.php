<?php

namespace Pg\modules\notifications\models;

/**
 * Access_permissions module
 *
 * @copyright	Copyright (c) 2000-2016
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class NotificationsUsersModel extends \Model
{
    /**
     *  Notyfications users list table
     */
    const TABLE_USERS_LIST = 'notifications_users';

    /**
     * Period attributes
     *
     * @var array
     */
    protected $fields = [
        self::TABLE_USERS_LIST => [
            'id',
            'id_user',
            'gid_notification'
        ]
    ];

    /**
     * Class constructor
     *
     * @return NotificationsUsersModel
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * User notifications
     *
     * @param integer $id_user
     *
     * @return array
     */
    public function getUserNotifications($id_user)
    {
        $result = $this->ci->db->select('gid_notification')
                ->from(DB_PREFIX . self::TABLE_USERS_LIST)
                ->where('id_user', $id_user)
                ->get()
                ->result_array();
        $data = [];
        foreach ($result as $value) {
            $data[] = $value['gid_notification'];
        }
        return $data;
    }

    /**
     * Is user by notification
     *
     * @param string $gid
     * @param integer $id_user
     *
     * @return boolean
     */
    public function isUserNotyfication($gid, $id_user)
    {
        return (bool) current($this->ci->db->select(implode(',', $this->fields[self::TABLE_USERS_LIST]))
                ->from(DB_PREFIX . self::TABLE_USERS_LIST)
                ->where('gid_notification', $gid)
                ->where('id_user', $id_user)
                ->get()
                ->result_array());
    }

    /**
     * Save user notifications list
     *
     * @param integer $id_user
     * @param array $notifications
     *
     * @return void
     */
     public function saveUserNotifications($id_user, $notifications)
    {
        $this->ci->db->where('id_user', $id_user);
        $this->ci->db->delete(DB_PREFIX . self::TABLE_USERS_LIST);
        if (!empty($notifications)) {
            foreach ($notifications as $notification) {
                $this->ci->db->insert(DB_PREFIX . self::TABLE_USERS_LIST, [
                    'id_user' => $id_user,
                    'gid_notification' => $notification
                ]);
                $this->ci->db->insert_id();
            }
        }
    }

}