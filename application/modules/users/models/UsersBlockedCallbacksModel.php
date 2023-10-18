<?php

namespace Pg\modules\users\models;

use Pg\Libraries\Traits\ModuleModel;

/**
 * user_information module
 *
 * @copyright	Copyright (c) 2000-2019
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */

class UsersBlockedCallbacksModel extends \Model
{
    
    use ModuleModel;
    
    /**
     * DB table name
     * 
     * @var string
     */
    const USERS_BLOCKED_CALLBACKS_TABLE = DB_PREFIX . 'users_blocked_callbacks';
    
    /**
     * Modules object properties
     *
     * @var array
     */
    private $fields = [
        'id',
        'module',
        'model',
        'callback',
        'callback_gid'
    ];
    
    /**
     * Modules object properties
     *
     * @var string
     */
    private $fields_str;

    /**
     * Class constructor
     *
     * @return UsersBlockedCallbacksModel
     */
    public function __construct()
    {
        parent::__construct();
        $this->fields_str = implode(', ', $this->fields);
    }

    /**
     * Add callback
     * @param array $data
     * @return integer
     */
    public function addCallback(array $data)
    {
        $this->ci->db->insert(self::USERS_BLOCKED_CALLBACKS_TABLE, $data);
        return $this->ci->db->affected_rows();
    }

    /**
     * Delete callbacks
     * @param string $module
     * @return mixed
     */
    public function deleteCallbacksByModule(string $module)
    {
         $this->ci->db
            ->where('module', $module)
            ->delete(self::USERS_BLOCKED_CALLBACKS_TABLE);
         return $this->ci->db->affected_rows();
    }

    /**
     * Get callbacks
     * @return mixed
     */
    private function getCallbacks()
    {
        //TODO refactoring in the new version
        $this->tableExists();
        return $this->ci->db
                ->select($this->fields_str)
                ->from(self::USERS_BLOCKED_CALLBACKS_TABLE)
                ->get()
                ->result_array();
    }

    /**
     * Execute callbacks
     * @param array $users_ids
     * @param int $is_blocked
     * @return mixd
     */
    public function executeCallbacks(array $users_ids, int $is_blocked)
    {
        $cbs = $this->getCallbacks();
        foreach ($cbs as $cb) {
            $method = $cb['callback'];            
            $ucfirst_module = $this->ucfirstModule($cb['module']);
            if (class_exists(NS_MODULES . $cb['module'] . '\\models\\' . $ucfirst_module . 'Model') !== false) {
                $model = ucfirst($cb['module']) . '_model';
                $this->ci->load->model($model);
                try {
                    $this->ci->$model->$method($users_ids, $is_blocked);
                } catch (Exception $e) {
                    //TODO
                }
            }
        }
    }
    
    /**
     * self::USERS_BLOCKED_CALLBACKS_TABLE exist
     * @return void
     */
    private function tableExists()
    {
        //TODO refactoring in the new version
        $is_table_exists = $this->ci->db->table_exists(self::USERS_BLOCKED_CALLBACKS_TABLE);
        if ($is_table_exists === false) {
            $this->ci->load->dbforge();
            $this->ci->dbforge->add_field([
                    'id' => [
                        'type' => 'INT',
                        'constraint' => 3,
                        'null' => FALSE,
                        'auto_increment' => TRUE
                    ],
                    'module' => [
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                        'null' => FALSE,
                    ],
                    'model' => [
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                        'null' => FALSE,
                    ],
                    'callback' => [
                        'type' => 'VARCHAR',
                        'constraint' => '255',
                        'null' => FALSE,
                    ],
                    'callback_gid' => [
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                        'null' => FALSE,
                    ]
                ]);
                $this->ci->dbforge->add_key('id', TRUE);
                $this->ci->dbforge->create_table(self::USERS_BLOCKED_CALLBACKS_TABLE);
        }
    }
}
