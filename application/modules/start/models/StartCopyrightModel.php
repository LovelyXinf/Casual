<?php

namespace Pg\modules\start\models;

use Pg\libraries\Cache\Manager as CacheManager;

if (!defined('COPYRIGHT_TABLE')) {
    define('COPYRIGHT_TABLE', DB_PREFIX . 'copyright');
}
/**
 * Start module
 *
 * @copyright	Copyright (c) 2000-2017
 * @author	Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class StartCopyrightModel extends \Model
{
    private $copyright_all = null;

    /**
     * Class constructor
     *
     * @return StartCopyrightModel
     */
    public function __construct()
    {
        parent::__construct();

        // TODO: cache
        $this->ci->cache->registerService('copyright', CacheManager::PROVIDER_REDIS);
    }

    /**
     * Used copyrights
     *
     * @var array
     */
    private $copyright_gids = [/* 'index_page', 'internal',  */'cpanel', 'operator'];

    private function getAllCopyright()
    {
        if ($this->copyright_all === null) {
            $fields = ['gid'];

            foreach ($this->ci->pg_language->languages as $lang_id => $lang_data) {
                $fields[] = 'value_' . $lang_id;
            }

            $this->copyright_all = $this->ci->cache->get('copyright', 'all', function () use ($fields) {
                $ci = &get_instance();

                return $ci->db->select($fields)
                    ->from(COPYRIGHT_TABLE)
                    ->get()->result_array();
            });
        }

        return $this->copyright_all;
    }

    /**
     * Get Copyrights' array for the specified language
     *
     * @param integer $lang_id
     * @return array
     */
    public function getCopyrightByLang($lang_id)
    {
        $copyright = $this->getAllCopyright();

        $return = [];

        foreach ($copyright as $raw) {
            $return[$raw['gid']] = $raw['value_' . $lang_id];
        }

        return $return;
    }

    /**
     * Get copyrights values for all languages
     *
     * @param boolean $is_formatted
     * @return array
     */
    public function getCopyright($is_formatted = false)
    {
        if ($is_formatted) {
            $copyright = $this->getAllCopyright();

            $languages = $this->ci->pg_language->languages;

            $return = [];
            foreach ($copyright as $raw) {
                foreach ($languages as $lang_id => $lang_data) {
                    $return[$raw['gid'] . '_' . $lang_id] = $raw['value_' . $lang_id];
                }
            }

            return $return;
        } else {
            return $this->getAllCopyright();
        }
    }

    /**
    * Validate page data
    *
    * @param integer $page_id page identifier
    * @param array   $data    page data
    *
    * @return array
    */
    public function validateCopyright($data)
    {
        $return          = ['errors' => [], 'data' => []];
        $default_lang_id = $data['lang_id'];

        // if (isset($data['data']['index_page_' . $default_lang_id])) {
        //     $return['data']['index_page_' . $default_lang_id] = trim($data['data']['index_page_' . $default_lang_id]);
        //     //copy data for saving
        //     $return['data']['index_page']['value_' . $default_lang_id] = $return['data']['index_page_' . $default_lang_id];

        //     if (empty($return['data']['index_page_' . $default_lang_id])) {
        //         $return['errors'][] = l('error_copyright_index_page_invalid', 'start');
        //     } else {
        //         foreach ($this->ci->pg_language->languages as $lid => $lang_data) {
        //             if ($lid == $default_lang_id) {
        //                 continue;
        //             }
        //             if (!isset($data['data']['index_page_' . $lid]) || empty($data['data']['index_page_' . $lid])) {
        //                 $return['data']['index_page_' . $lid] = $return['data']['index_page_' . $default_lang_id];
        //             } else {
        //                 $return['data']['index_page_' . $lid] = trim($data['data']['index_page_' . $lid]);

        //                 if (empty($return['data']['index_page_' . $lid])) {
        //                     $return['errors'][] = l('error_copyright_index_page_invalid', 'start');
        //                     break;
        //                 }
        //             }
        //             //copy data for saving
        //             $return['data']['index_page']['value_' . $lid] = $return['data']['index_page_' . $lid];
        //         }
        //     }
        // } else {
        //     $return['errors'][] = l('error_copyright_index_page_invalid', 'start');
        // }

        // if (isset($data['data']['internal_' . $default_lang_id])) {
        //     $return['data']['internal_' . $default_lang_id] = trim($data['data']['internal_' . $default_lang_id]);
        //     //copy data for saving
        //     $return['data']['internal']['value_' . $default_lang_id] = $return['data']['internal_' . $default_lang_id];

        //     if (empty($return['data']['internal_' . $default_lang_id])) {
        //         $return['errors'][] = l('error_copyright_internal_invalid', 'start');
        //     } else {
        //         foreach ($this->ci->pg_language->languages as $lid => $lang_data) {
        //             if ($lid == $default_lang_id) {
        //                 continue;
        //             }
        //             if (!isset($data['data']['internal_' . $lid]) || empty($data['data']['internal_' . $lid])) {
        //                 $return['data']['internal_' . $lid] = $return['data']['internal_' . $default_lang_id];
        //             } else {
        //                 $return['data']['internal_' . $lid] = trim($data['data']['internal_' . $lid]);
        //                 if (empty($return['data']['internal_' . $lid])) {
        //                     $return['errors'][] = l('error_copyright_internal_invalid', 'start');
        //                     break;
        //                 }
        //             }
        //             //copy data for saving
        //             $return['data']['internal']['value_' . $lid] = $return['data']['internal_' . $lid];
        //         }
        //     }
        // } else {
        //     $return['errors'][] = l('error_copyright_internal_invalid', 'start');
        // }

        if (isset($data['data']['cpanel_' . $default_lang_id])) {
            $return['data']['cpanel_' . $default_lang_id] = trim($data['data']['cpanel_' . $default_lang_id]);
            //copy data for saving
            $return['data']['cpanel']['value_' . $default_lang_id] = $return['data']['cpanel_' . $default_lang_id];

            if (empty($return['data']['cpanel_' . $default_lang_id])) {
                $return['errors'][] = l('error_copyright_cpanel_invalid', 'start');
            } else {
                foreach ($this->ci->pg_language->languages as $lid => $lang_data) {
                    if ($lid == $default_lang_id) {
                        continue;
                    }
                    if (!isset($data['data']['cpanel_' . $lid]) || empty($data['data']['cpanel_' . $lid])) {
                        $return['data']['cpanel_' . $lid] = $return['data']['cpanel_' . $default_lang_id];
                    } else {
                        $return['data']['cpanel_' . $lid] = trim($data['data']['cpanel_' . $lid]);
                        if (empty($return['data']['cpanel_' . $lid])) {
                            $return['errors'][] = l('error_copyright_cpanel_invalid', 'start');
                            break;
                        }
                    }
                    //copy data for saving
                    $return['data']['cpanel']['value_' . $lid] = $return['data']['cpanel_' . $lid];
                }
            }
        } else {
            $return['errors'][] = l('error_copyright_cpanel_invalid', 'start');
        }

        if (isset($data['data']['operator_' . $default_lang_id])) {
            $return['data']['operator_' . $default_lang_id] = trim($data['data']['operator_' . $default_lang_id]);
            //copy data for saving
            $return['data']['operator']['value_' . $default_lang_id] = $return['data']['operator_' . $default_lang_id];

            if (empty($return['data']['operator_' . $default_lang_id])) {
                $return['errors'][] = l('error_copyright_operator_invalid', 'start');
            } else {
                foreach ($this->ci->pg_language->languages as $lid => $lang_data) {
                    if ($lid == $default_lang_id) {
                        continue;
                    }
                    if (!isset($data['data']['operator_' . $lid]) || empty($data['data']['operator_' . $lid])) {
                        $return['data']['operator_' . $lid] = $return['data']['operator_' . $default_lang_id];
                    } else {
                        $return['data']['operator_' . $lid] = trim($data['data']['operator_' . $lid]);
                        if (empty($return['data']['operator_' . $lid])) {
                            $return['errors'][] = l('error_copyright_operator_invalid', 'start');
                            break;
                        }
                    }
                    //copy data for saving
                    $return['data']['operator']['value_' . $lid] = $return['data']['operator_' . $lid];
                }
            }
        } else {
            $return['errors'][] = l('error_copyright_operator_invalid', 'start');
        }

        return $return;
    }

    /**
     * Save copyrights info
     *
     * @param string $gid
     * @param array $attrs
     */
    public function saveCopyrightByGid($gid, $attrs)
    {
        $this->ci->db->where('gid', $gid);
        $q = $this->ci->db->get(COPYRIGHT_TABLE);
        if ($q->num_rows() > 0) {
            $this->ci->db->where('gid', $gid);
            $this->ci->db->update(COPYRIGHT_TABLE, $attrs);
        } else {
            $attrs['gid'] = $gid;
            $this->ci->db->insert(COPYRIGHT_TABLE, $attrs);
        }

        $this->ci->cache->flush('copyright');

        $this->copyright_all = null;
    }

    /**
     * Save copyrights
     *
     * @param array $attrs
     */
    public function saveCopyright($attrs)
    {
        foreach ($this->copyright_gids as $gid) {
            $this->saveCopyrightByGid($gid, $attrs[$gid]);
        }
    }

    /**
     * Install copyrights fields, depended on language
     *
     * @param integer $lang_id language identifier
     *
     * @return void
     */
    public function langDedicateModuleCallbackAdd($lang_id = false)
    {
        if (!$lang_id) {
            return;
        }

        $this->ci->load->dbforge();

        $this->ci->dbforge->add_column(COPYRIGHT_TABLE, [
            'value_' . $lang_id => [
                'type' => 'text',
                'null' => false
            ]
        ]);

        $default_lang_id = $this->ci->pg_language->get_default_lang_id();
        if ($lang_id != $default_lang_id) {
            $this->ci->db->set('value_' . $lang_id, 'value_' . $default_lang_id, false);
            $this->ci->db->update(COPYRIGHT_TABLE);
        }

        $this->ci->cache->flush('copyright');
    }

    /**
     * Uninstall copyrights fields, depended on language
     *
     * @param integer $lang_id language identifier
     *
     * @return void
     */
    public function langDedicateModuleCallbackDelete($lang_id = false)
    {
        if (!$lang_id) {
            return;
        }

        $this->ci->load->dbforge();
        $this->ci->dbforge->drop_column(COPYRIGHT_TABLE, 'value_' . $lang_id);

        $this->ci->cache->flush('copyright');

        $this->copyright_all = null;
    }

    public function __call($name, $args)
    {
        $methods = [
            'lang_dedicate_module_callback_add'    => 'langDedicateModuleCallbackAdd',
            'lang_dedicate_module_callback_delete' => 'langDedicateModuleCallbackDelete',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
