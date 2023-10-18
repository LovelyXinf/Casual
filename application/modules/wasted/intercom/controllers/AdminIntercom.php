<?php

namespace Pg\modules\intercom\controllers;

use Pg\modules\intercom\models\IntercomModel;

/**
 * Intercom admin side controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * */
class AdminIntercom extends \Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->Menu_model->set_menu_active_item('admin_menu', 'marketing_items');
    }

    /**
     * Index page
     *
     * @param string $filter
     *
     * @return void
     */
    public function index($filter = 'google')
    {
        $this->settings($filter);
    }

    /**
     * Settings marketing service
     *
     * @param string $filter
     *
     * @return void
     */
    public function settings($filter)
    {
        $this->view->setHeader(l('admin_header_intercom_settings', 'intercom'));
        $this->view->assign('filter', $filter);
        $this->view->assign('services', IntercomModel::getServices());
        $this->view->assign('content', $this->getFilterData($filter));
        $this->view->render('settings');
    }

    /**
     * Filter data
     *
     * @param type $filter
     *
     * @return string
     */
    private function getFilterData($filter)
    {
        $this->view->assign('data', IntercomModel::getData($filter));
        return $this->view->fetch($filter);
    }
        
}
