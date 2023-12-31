<?php

use Pg\libraries\Cache\Manager as CacheManager;

/**
 * Libraries
 *
 * @package     PG_Core
 *
 * @copyright   Copyright (c) 2000-2014 PG Core
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

define('LANG_PAGES_TABLE', DB_PREFIX . 'lang_pages');

/**
 * Languages pages driver
 *
 * Store in database
 *
 * @package     PG_Core
 * @subpackage  Libraries
 *
 * @category    models
 *
 * @copyright   Copyright (c) 2000-2014 PG Core
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class lang_pages_driver
{
    /**
     * Link to CodeIgniter object
     *
     * @var object
     */
    public $ci;

    /**
     * Class constructor
     *
     * @return lang_pages_driver
     */
    public function __construct()
    {
        $this->ci = &get_instance();

        // TODO: cache
        $this->ci->cache->registerService('langs_pages', CacheManager::PROVIDER_REDIS);
    }

    /**
     * Return module content by guid
     *
     * get all module strings from base and put it to cache ($modules_data)
     *
     * @param string  $module_gid module guid
     * @param integer $lang_id    language identifier
     *
     * @return array
     */
    public function get_module($module_gid, $lang_id)
    {
        $fields = ['gid'];

        foreach ($this->ci->pg_language->languages as $lid => $lang_data) {
            $fields[] = "value_" . $lid;
        }

        $results_raw = $this->ci->cache->get('langs_pages', $module_gid, function () use ($fields, $module_gid)
        {
            $ci = &get_instance();

            $results_raw = $ci->db->select(implode(", ", $fields))
                ->from(LANG_PAGES_TABLE)
                ->where('module_gid', $module_gid)
                ->get()->result_array();

            if (empty($results_raw) || !is_array($results_raw)) {
                return [];
            }

            return $results_raw;
        });

        $results = [];

        foreach ($results_raw as $result_raw) {
            $results[$result_raw['gid']] = (!empty($result_raw['value_' .  $lang_id])) ? $result_raw['value_' . $lang_id] : "";
        }

        return $results;
    }

    /**
     * Save pages entries
     *
     * @param string  $module_gid   module guid
     * @param string  $strings_data entry data
     * @param integer $lang_id      language identifier
     *
     * @return void
     */
    public function set_module_strings($module_gid, $strings_data, $lang_id)
    {
        $lang_value = "value_" . $lang_id;
        $module_lang = $this->get_module($module_gid, $lang_id);
        foreach ($strings_data as $gid => $value) {
            if (isset($module_lang[$gid])) {
                if (!is_array($value)) {
                    if ($module_lang[$gid] != $value) {
                        $this->ci->db->where('module_gid', $module_gid);
                        $this->ci->db->where('gid', $gid);
                        $this->ci->db->update(LANG_PAGES_TABLE, array($lang_value => strval($value)));
                    }
                }
            } else {
                if (!is_array($value)) {
                    $data = array(
                        'module_gid' => $module_gid,
                        'gid'        => $gid,
                        $lang_value  => strval($value),
                    );
                    $this->ci->db->insert(LANG_PAGES_TABLE, $data);
                }
            }
        }

        // TODO: cache
        $this->ci->cache->delete('langs_pages', $module_gid);
    }

    /**
     * Remove pages enrty
     *
     * @param string $module_gid module guid
     * @param array  $gids       entries guids
     *
     * @return void
     */
    public function delete_module_strings($module_gid, $gids)
    {
        foreach ($gids as $gid) {
            $this->ci->db->where('module_gid', $module_gid);
            $this->ci->db->where('gid', $gid);
            $this->ci->db->delete(LANG_PAGES_TABLE);
        }

        // TODO: cache
        $this->ci->cache->delete('langs_pages', $module_gid);
    }

    /**
     * Remove data source module
     *
     * @param string $module_gid module guid
     *
     * @return void
     */
    public function delete_module($module_gid)
    {
        $this->ci->db->where('module_gid', $module_gid);
        $this->ci->db->delete(LANG_PAGES_TABLE);

        // TODO: cache
        $this->ci->cache->delete('langs_pages', $module_gid);
    }

    /**
     * Install properties depended on language
     *
     * @param integer $lang_id language idnetifier
     *
     * @return void
     */
    public function add_language($lang_id)
    {
        ////// add field to base
        if (!$this->ci->db->table_exists(LANG_PAGES_TABLE)) {
            $this->create_table();
        }

        $field_name = "value_" . $lang_id;
        if (!$this->ci->db->field_exists($field_name, LANG_PAGES_TABLE)) {
            $this->ci->load->dbforge();
            $fields = array(
                $field_name => array('type' => 'TEXT', 'null' => false),
            );
            $this->ci->dbforge->add_column(LANG_PAGES_TABLE, $fields);
        }

        // TODO: cache
        $this->ci->cache->flush('langs_pages');
    }

    /**
     * Uninstall properties depended on language
     *
     * @param integer $lang_id language identifier
     *
     * @return void
     */
    public function delete_language($lang_id)
    {
        ////// delete field from base

        if (!$this->ci->db->table_exists(LANG_PAGES_TABLE)) {
            $this->create_table();
        }

        $field_name = "value_" . $lang_id;
        if ($this->ci->db->field_exists($field_name, LANG_PAGES_TABLE)) {
            $this->ci->load->dbforge();
            $this->ci->dbforge->drop_column(LANG_PAGES_TABLE, $field_name);
        }

        // TODO: cache
        $this->ci->cache->flush('langs_pages');
    }

    /**
     * Copy data to another language
     *
     * @param integer $lang_from source language identifier
     * @param integer $lang_to   destination language idnetifier
     *
     * @return void
     */
    public function copy_language($lang_from, $lang_to)
    {
        $field_name_from = "value_" . $lang_from;
        $field_name_to = "value_" . $lang_to;
        $this->ci->db->query('UPDATE ' . LANG_PAGES_TABLE . ' SET ' . $field_name_to . '=' . $field_name_from);

        // TODO: cache
        $this->ci->cache->flush('langs_pages');
    }

    /**
     * Install data source structure
     *
     * @return void
     */
    public function create_table()
    {
        $this->ci->load->dbforge();

        $fields = array(
            'id' => array(
                'type'           => 'INT',
                'constraint'     => 3,
                'null'           => false,
                'auto_increment' => true,
            ),
            'module_gid' => array(
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ),
            'gid' => array(
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ),
        );

        $this->ci->dbforge->add_field($fields);
        $this->ci->dbforge->add_key('id', true);
        $this->ci->dbforge->add_key('module_gid');
        $this->ci->dbforge->create_table(LANG_PAGES_TABLE);
    }
}
