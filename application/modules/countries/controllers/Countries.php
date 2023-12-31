<?php

namespace Pg\modules\countries\controllers;
use Pg\modules\countries\models\CountriesModel;

/**
 * Countries user side controller
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category	modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * */
class Countries extends \Controller
{
    /**
     * link to CodeIgniter object
     *
     * @var object
     */

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Countries_model");
    }

    public function ajaxGetLocations()
    {
        $return = [];
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $is_search = filter_input(INPUT_POST, 'is_search', FILTER_VALIDATE_INT);
        if ($name) {
            $locations = $this->Countries_model->getLocations(
                str_replace(array(','), ' ', trim($name)),
                array("priority" => "ASC"),
                $this->pg_language->current_lang_id,
                $this->pg_language->languages,
                null,
                null,
                null,
                CountriesModel::COUNT_ITEMS,
                $is_search
            );

            $return["all"] = count($locations['countries']) + count($locations['regions']) + count($locations['cities']);
            $return["items"] = $locations ? $locations : [];
        } else {
            $return["all"] = 0;
            $return["items"] = [];
        }
        
        if(!$return["all"]) {
            $return["error"] = l('api_error_wrong_city_id', 'countries');
        }
        
        $this->view->assign($return);

        return;
    }

    public function ajaxGetCountries()
    {
        $return = array();
        $lang_id = $this->pg_language->current_lang_id;
        $order_by['priority'] = 'ASC';
        $order_by['lang_' . $lang_id] = 'ASC';
        $countries = $this->Countries_model->get_countries($order_by, array(), array(), $lang_id);
        $return["all"] = count($countries);
        if ($return["all"]) {
            foreach ($countries as $country) {
                $return["items"][] = array(
                    "id"   => $country["id"],
                    "code" => $country["code"],
                    "name" => $country["name"],
                );
            }
        }
        $this->view->assign($return);

        return;
    }

    public function ajaxGetRegions($country_code)
    {
        $return = array();
        $lang_id = $this->pg_language->current_lang_id;
        $order_by['priority'] = 'ASC';
        $order_by['lang_' . $lang_id] = 'ASC';
        $return["country"] = $this->Countries_model->get_country($country_code, $lang_id);
        $regions = $this->Countries_model->get_regions($country_code, $order_by, array(), array(), $lang_id);
        $return["all"] = count($regions);
        if ($return["all"]) {
            foreach ($regions as $region) {
                $return["items"][] = array(
                    "id"   => $region["id"],
                    "code" => $region["code"],
                    "name" => $region["name"],
                );
            }
        }
        $this->view->assign($return);

        return;
    }

    public function ajaxGetCities($id_region, $page = 1)
    {
        $search_string = trim(strip_tags($this->input->post('search', true)));
        $return = array();
        $lang_id = $this->pg_language->current_lang_id;
        $order_by['lang_' . $lang_id] = 'ASC';
        $items_on_page = 400;
        $return["region"] = $this->Countries_model->get_region($id_region, $lang_id);
        $return["country"] = $this->Countries_model->get_country($return["region"]["country_code"], $lang_id);

        $params["where"]["id_region"] = $id_region;
        if (!empty($search_string)) {
            $var = "name";
            if ($lang_id) {
                $var = 'lang_' . $lang_id;
            }
            $params["where"][$var . " LIKE"] = "%" . $search_string . "%";
        }
        $return["all"] = $this->Countries_model->get_cities_count($params);
        $return["pages"] = ceil($return["all"] / $items_on_page);
        $return["current_page"] = $page;
        $return["items"] = array_values($this->Countries_model->get_cities($page, $items_on_page, $order_by, $params, array(), $lang_id));

        $this->view->assign($return);

        return;
    }

    public function ajaxGetForm($type, $var = 0)
    {
        $data = array();

        switch ($type) {
            case "region":
                $data["country"] = $this->Countries_model->get_country($var, $this->pg_language->current_lang_id);
                break;
            case "city":
                $data["region"] = $this->Countries_model->get_region($var, $this->pg_language->current_lang_id);
                $data["country"] = $this->Countries_model->get_country($data["region"]["country_code"], $this->pg_language->current_lang_id);
                break;
        }

        $this->view->assign("data", $data);
        $this->view->assign("type", $type);
        $this->view->render('ajax_country_form');
    }

    public function ajaxGetData($type, $var)
    {
        $data = array();

        switch ($type) {
            case "country":
                $data["country"] = $this->Countries_model->get_country($var, $this->pg_language->current_lang_id);
                break;
            case "region":
                $data["region"] = $this->Countries_model->get_region($var, $this->pg_language->current_lang_id);
                $data["country"] = $this->Countries_model->get_country($data["region"]["country_code"], $this->pg_language->current_lang_id);
                break;
            case "city":
                $data["city"] = $this->Countries_model->get_city($var, $this->pg_language->current_lang_id);
                $data["region"] = $this->Countries_model->get_region($data["city"]["id_region"], $this->pg_language->current_lang_id);
                $data["country"] = $this->Countries_model->get_country($data["city"]["country_code"], $this->pg_language->current_lang_id);
                break;
        }

        $this->view->assign($data);

        return;
    }

    public function ajaxGetCurrentLocation()
    {
        if ($this->input->post('point')) {
            $location = explode(';', $this->input->post('point'));
            if (!empty($location)) {
                $latitude = floatval($location[0]);
                $longitude = floatval($location[1]);
                $closest_cities = $this->Countries_model->getClosestCities($latitude, $longitude);                
                if (!empty($closest_cities)) {
                    $city = $closest_cities[0];
                    $data = ['city' => $city];
                    $data['city']['output_name'] = $city['lang_' . $this->pg_language->current_lang_id];
                    $this->view->assign("data", $data);
                }
            }
        }
        $this->view->render();
    }

    public function ajaxGetSelectorForm($type, $var = 0)
    {
        $return = [];
        $lang_id = $this->pg_language->current_lang_id;
        $is_search = filter_input(INPUT_POST, 'is_search', FILTER_VALIDATE_INT);

        switch ($type) {
            case 'country':
                    $order_by['priority'] = 'ASC';
                    $order_by['lang_' . $lang_id] = 'ASC';
                    $countries = $this->Countries_model->getCountries($order_by, [], [], $lang_id);
                    $return["all"] = count($countries);
                    if ($return["all"]) {
                        foreach ($countries as $country) {
                            $return["items"][] = [
                                "id"   => $country["id"],
                                "code" => $country["code"],
                                "name" => $country["name"],
                            ];
                        }
                    }
                break;
            case 'region':
                    $order_by['priority'] = 'ASC';
                    $order_by['lang_' . $lang_id] = 'ASC';
                    $return["country"] = $this->Countries_model->getCountry($var, $lang_id);
                    $regions = $this->Countries_model->getRegions($var, $order_by, [], [], $lang_id);
                    $return["all"] = count($regions);
                    if ($return["all"]) {
                        foreach ($regions as $region) {
                            $return["items"][] = [
                                "id"   => $region["id"],
                                "code" => $region["code"],
                                "name" => $region["name"],
                            ];
                        }
                    }
                break;
            case 'city':
                    $page = 1;
                    $search_string = trim(strip_tags($this->input->post('search', true)));
                    $order_by['lang_' . $lang_id] = 'ASC';
                    $return["region"] = $this->Countries_model->getRegion($var, $lang_id);
                    $return["country"] = $this->Countries_model->getCountry($return["region"]["country_code"], $lang_id);
                    $params = [
                        'where' => ['id_region' => $var]
                    ];
                    if (!empty($search_string)) {
                        $var = "name";
                        if ($lang_id) {
                            $var = 'lang_' . $lang_id;
                        }
                        $params["where"][$var . " LIKE"] = "%" . $search_string . "%";
                    }
                    $return["items"] = array_values($this->Countries_model->getCities($page, null, $order_by, $params, [], $lang_id));
                break;
        }

        $this->view->assign('is_search', $is_search);
        $this->view->assign('type', $type);
        $this->view->assign('data', $return);

        $return['html'] = $this->view->fetch('location_select_form');

        $this->view->assign($return);
        $this->view->render();
    }

    public function ajaxGetLocationName()
    {
        $return = array('output_name' => '');
        $location_data = array();

        $location_data[0] = array(
                'country' => $this->input->post('country_code', true),
                'region'  => $this->input->post('region_id', true),
                'city'    => $this->input->post('city_id', true),
            );

        $this->load->helper('countries');
        $return['output_name'] =  cities_output_format($location_data);

        $this->view->assign($return);
        $this->view->render();
    }
}
