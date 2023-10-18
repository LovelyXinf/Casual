<?php

namespace Pg\modules\geomap\controllers;

/**
 * Geomaps api controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category	modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Alexander Batukhtin <abatukhtin@pilotgroup.net>
 * */
class ApiGeomap extends \Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('geomap/models/Geomap_settings_model');
    }

    /**
     * Saves geomap settings for the user
     *
     * @param string $gid
     * @param int    $zoom
     * @param int    $view_type
     * @param float  $lat
     * @param float  $lon
     */
    /**
    * @api {post} /geomap/saveSettings Saves geomap settings for the user
    * @apiGroup Geomap
    * @apiParam {string} gid geomap gid
    * @apiParam {int} zoom zoom
    * @apiParam {int} view_type view type
    * @apiParam {float} lat latitude
    * @apiParam {float} lon longitude
    */ 
    public function saveSettings()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            log_message('error', 'geomap API: Empty user id');
            $this->set_api_content('errors', l('error_cant_save_settings', 'geomap'));

            return false;
        }
        $gid = $this->input->post('gid');
        if (!$gid) {
            log_message('error', 'geomap API: Empty gid');
            $this->set_api_content('errors', l('error_cant_save_settings', 'geomap'));

            return false;
        }
        $object_id = $this->input->post('object_id');

        $post_data = array(
            'zoom'      => intval($this->input->post('zoom')),
            'view_type' => intval($this->input->post('view_type')),
            'lat'       => $this->input->post('lat', true),
            'lon'       => $this->input->post('lon', true),
        );

        $validate_data = $this->Geomap_settings_model->validate_settings($post_data);
        if (!empty($validate_data['errors'])) {
            $this->set_api_content('errors', $validate_data['errors']);
        } else {
            $this->Geomap_settings_model->save_settings($gid, $user_id, $object_id, $gid, $validate_data['data']);
            $this->set_api_content('data', $post_data);
        }

        return;
    }
}
