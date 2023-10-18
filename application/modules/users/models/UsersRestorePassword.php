<?php
namespace Pg\modules\users\models;

/**
 * Users module
 *
 * @copyright	Copyright (c) 2000-2019
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class UsersRestorePassword extends \Model
{

    /**
     * DB table name
     * 
     * @var string
     */
    const RESTORE_TABLE = DB_PREFIX . 'users_restore_password';

    /**
     * Date format
     *
     * @var string
     */
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * Modules object properties
     * 
     * @var array 
     */
    protected $fields = [
        self::RESTORE_TABLE => [
            'id',
            'id_user',
            'code',
            'date_created'
        ]
    ];

    /**
     * Constructor
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Return data
     * 
     * @param array $params
     * 
     * @return array
     */
    protected function get(array $params)
    {
        $this->ci->db->select(implode(", ", $this->fields[self::RESTORE_TABLE]));
        $this->ci->db->from(self::RESTORE_TABLE);
        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        return $this->ci->db->get()->result_array();
    }

    /**
     * Data by code
     * 
     * @param mixed $code
     * 
     * @return array
     */
    public function getDataByCode($code = false)
    {
        return current($this->get([
                'where' => ['code' => $code]
        ]));
    }

    /**
     * Data by user
     * 
     * @param mixed $id_user
     * 
     * @return array
     */
    public function getDataByUser($id_user = false)
    {
        return current($this->get([
                'where' => ['id_user' => $id_user]
        ]));
    }

    /**
     * Save item
     * 
     * @param array $data
     * 
     * @return integer
     */
    public function set(array $data)
    {
        $this->ci->db->insert(self::RESTORE_TABLE, $data);
        return $this->ci->db->insert_id();
    }

    /**
     * Delete items
     * 
     * @param array $params
     * 
     * @return void
     */
    public function delete(array $params)
    {
        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }
        $this->ci->db->delete(self::RESTORE_TABLE);
    }

    /**
     * Restore password
     * 
     * @param array $user_data
     * @param bool $is_admin
     * 
     * @return void
     */
    public function restore(array $user_data, $is_admin = false)
    {
        $data = [
            'id_user' => $user_data['id'],
            'code' => $this->createCode($user_data['email'])
        ];
        $this->delete(['where' => ['id_user' => $user_data['id']]]);
        $this->set($data);
        $user_data['restore_link'] = site_url('users/restore/' . $data['code']);
        $user_data['is_admin'] = $is_admin;
        $this->sendNotification($user_data, 'users_restore_password');
    }

    /**
     * Sending a notification to non-existent user
     *
     * @param string $email
     *
     * @return void
     */
    public function userNoExists($email)
    {
        $this->sendNotification(['email' => $email], 'user_no_exists_restore');
    }

    /**
     * Sending a notification to an unconfirmed user
     * 
     * @param array $user_data
     * 
     * @return void
     */
    public function userUnconfirmed(array $user_data)
    {
        $this->sendNotification($user_data, 'user_unconfirmed_restore');
    }

    /**
     * Sending a notification to a blocked user
     * 
     * @param array $user_data
     * 
     * @return void
     */
    public function userIsBlocked(array $user_data)
    {
        $this->sendNotification($user_data, 'user_is_blocked_restore');
    }

    /**
     * Send notification
     * 
     * @param array $data
     * @param string $gid
     * 
     * @return void
     */
    private function sendNotification(array $data, string $gid)
    {
        $this->ci->load->model('Notifications_model');
        $lang_id = !empty($data['lang_id']) ? $data['lang_id'] : $this->ci->pg_language->current_lang_id;
        $this->ci->Notifications_model->sendNotification($data["email"], $gid, $data, '', $lang_id);
    }

    /**
     * Create code
     * 
     * @param string $email
     * 
     * @return string
     */
    private function createCode(string $email)
    {
        return sha1(mt_rand(1, 90000) . date(self::DATE_FORMAT) . $email);
    }

    /**
     * Delete by cron
     * 
     * @retrun void
     */
    public function cronDelete()
    {
        $this->delete(['where' => [
                'date_created + INTERVAL 1 DAY <=' => date(self::DATE_FORMAT)
        ]]);
    }
    
    /**
     * Update password
     * 
     * @param string $code
     * @param string $password
     * 
     * @return mixed
     */
    public function updatePassword(string $code, string $password)
    {
        $data = $this->getDataByCode($code);
        if (!empty($data)) {
            $this->delete(['where' => ['id_user' => $data['id_user']]]);            
            $user_data = $this->ci->Users_model->getUserById($data['id_user']);
            $user_data['contact_us'] = $this->ci->pg_module->is_module_installed('tickets') ? site_url('tickets') : site_url('contact_us'); 
            $this->sendNotification($user_data, 'users_restore_password_success');
            $password = password_hash($password, PASSWORD_DEFAULT);
            return $this->ci->Users_model->saveUser($data['id_user'], ['password' => $password]);
        }
        return false;
    }
    
    /**
     * Send message to user
     * 
     * @param string $email user email address
     * 
     * @return void
     */
    public function sendUserLink($email)
    {
        $user_data = $this->ci->Users_model->getUserByEmail($email);     
        if (empty($user_data) || !$user_data["id"]) { 
            $this->userNoExists($email);                
        } elseif (!$user_data["confirm"]) {
            $this->userUnconfirmed($user_data);                
        } elseif (!$user_data["approved"]) {
            $this->userIsBlocked($user_data);                
        } else {                
            $this->restore($user_data);     
        }        
    }
}
