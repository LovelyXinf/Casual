<?php

namespace Pg\modules\banners\models;

use Pg\libraries\Cache\Manager as CacheManager;

/**
 * Banners stat model
 *
 *
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */

if (!defined('TABLE_BANNERS_STAT_GENERAL')) {
    define('TABLE_BANNERS_STAT_GENERAL', DB_PREFIX . 'banners_statistics');
}

if (!defined('TABLE_BANNERS_STAT_HOURLY')) {
    define('TABLE_BANNERS_STAT_HOURLY', DB_PREFIX . 'banners_statistics_hourly');
}

if (!defined('TABLE_BANNERS_STAT_TEMP')) {
    define('TABLE_BANNERS_STAT_TEMP', DB_PREFIX . 'banners_statistics_temp');
}

/**
 * Banners stat model
 *
 * @package     PG_RealEstate
 * @subpackage  Banners
 *
 * @category    models
 *
 * @copyright   Copyright (c) 2000-2014 PG Real Estate - php real estate listing software
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */
class BannersStatModel extends \Model
{
    /**
     * Banner statistics data source as file
     *
     * @var string
     */
    public $banner_stat_file = 'temp/logs/banner_stat.txt';

    /**
     * Banner statistics data source type
     *
     * 'file' or 'db'
     *
     * @var string
     */
    public $get_stat_type = "db";

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->banner_stat_file = SITE_PATH . $this->banner_stat_file;

        $this->ci->cache->registerService('banners_stat_temp', CacheManager::PROVIDER_REDIS);
    }

    /**
     * Increase banner click
     *
     * @param integer $banner_id banner identifier
     *
     * @return integer
     */
    public function addHit($banner_id)
    {
        return $this->insertAction($banner_id, 'click');
    }

    /**
     * Increase banner view
     *
     * @param integer $banner_id banner identifier
     *
     * @return boolean
     */
    public function addView($banner_id)
    {
        return $this->insertAction($banner_id, 'view');
    }

    /**
     * Insert new action in table
     *
     * @param integer $banner_id banner identifier
     * @param string  $action    parameter name
     *
     * @return boolean
     */
    protected function insertAction($banner_id, $action = 'click')
    {
        $result        = false;
        $banner_id    = (is_numeric($banner_id) and $banner_id > 0) ? intval($banner_id) : 0;
        $action        = ('click' == trim($action) or 'view' == trim($action)) ? trim($action) : '';

        if ($banner_id && $action) {
            switch ($this->get_stat_type) {
                case 'file':
                    $str = $banner_id . ";" . date("Y-m-d H:i:s") . ";" . $action . "\n";
                    $h = fopen($this->banner_stat_file, "a+");
                    if ($h) {
                        fwrite($h, $str);
                        fclose($h);
                        chmod($this->banner_stat_file, 0777);
                        $result = true;
                    }
                break;
                case 'db':
                    $data = array(
                        'banner_id' => $banner_id,
                        'date'      => date('Y-m-d H:i:s'),
                        'action'    => $action,
                    );
                    // TODO: cache
                    $stat = $this->ci->cache->get('banners_stat_temp', 'all', function() {
                        return [];
                    });
                    $stat[] = $data;
                    $this->ci->cache->set('banners_stat_temp', 'all', $stat, function () use ($data)
                    {
                        $ci = &get_instance();
                        $ci->db->insert(TABLE_BANNERS_STAT_TEMP, $data);
                    });
                break;
            }
        }

        return (bool) $result;
    }

    /**
     * Update banners statistics for all periods
     *
     * @return void
     */
    public function updateFileStatistic()
    {
        switch ($this->get_stat_type) {
            case 'file':
                $content_array = file($this->banner_stat_file);
                $h = fopen($this->banner_stat_file, "w");
                fwrite($h, '');
                fclose($h);
                chmod($this->banner_stat_file, 0777);

                if (empty($content_array)) {
                    return;
                }

                $stat = array();
                foreach ($content_array as $string) {
                    list($banner_id, $datetime, $type) = explode(";", $string);
                    $uts = strtotime($datetime);
                    $date = date("Y-m-d", $uts);
                    $hour = intval(date("H", $uts));
                    $banner_id = intval($banner_id);
                    $type = strval(preg_replace("/[\n\r\t]+/", "", $type));

                    if (isset($stat[$banner_id][$date][$hour][$type])) {
                        ++$stat[$banner_id][$date][$hour][$type];
                    } else {
                        $stat[$banner_id][$date][$hour][$type] = 1;
                    }
                }
            break;

            case 'db':
                $result = $this->ci->db->select("banner_id, DATE_FORMAT(date, '%Y-%m-%d') as fdate, DATE_FORMAT(date, '%H') as fhour, action")->from(TABLE_BANNERS_STAT_TEMP)->get()->result_array();
                $stat = array();
                if (!empty($result)) {
                    foreach ($result as $r) {
                        $date = $r["fdate"];
                        $hour = intval($r["fhour"]);
                        $banner_id = intval($r["banner_id"]);
                        $type = strval($r["action"]);

                        if (isset($stat[$banner_id][$date][$hour][$type])) {
                            ++$stat[$banner_id][$date][$hour][$type];
                        } else {
                            $stat[$banner_id][$date][$hour][$type] = 1;
                        }
                    }
                }
                $this->ci->db->truncate(TABLE_BANNERS_STAT_TEMP);
            break;
        }

        foreach ($stat as $banner_id => $banner_data) {
            foreach ($banner_data as $date => $date_data) {
                foreach ($date_data as $hour => $hour_data) {
                    foreach ($hour_data as $type => $count) {
                        $r = $this->ci->db->select("id, stat")->from(TABLE_BANNERS_STAT_HOURLY)->where('banner_id', $banner_id)->where('date', $date)->where('hour', $hour)->where('action', $type)->get()->result_array();
                        if (!empty($r)) {
                            $update_data["stat"] = intval($r[0]["stat"] + $count);
                            $this->ci->db->where("id", $r[0]["id"]);
                            $this->ci->db->update(TABLE_BANNERS_STAT_HOURLY, $update_data);
                        } else {
                            $update_data = array(
                                "banner_id" => $banner_id,
                                "date"      => $date,
                                "hour"      => $hour,
                                "action"    => $type,
                                "stat"      => $count,
                            );
                            $this->ci->db->insert(TABLE_BANNERS_STAT_HOURLY, $update_data);
                        }
                    }
                }
            }
        }
    }

    /**
     * Update banners statistics for specific date
     *
     * @param string $date date value
     *
     * @return void
     */
    public function updateDayStatistic($date)
    {
        $uts = strtotime($date);
        $year = date("Y", $uts);
        $month = date("m", $uts);
        $week = date("W", $uts);
        $day = date("d", $uts);
        $this->ci->db->where("year", $year);
        $this->ci->db->where("month", $month);
        $this->ci->db->where("day", $day);
        $this->ci->db->where("report_type", 'day');
        $this->ci->db->delete(TABLE_BANNERS_STAT_GENERAL);

        /// views
        $this->ci->db->select("banner_id, SUM(stat) AS sum_stat")->from(TABLE_BANNERS_STAT_HOURLY);
        $this->ci->db->where("date", $date);
        $this->ci->db->where("action", 'view');
        $this->ci->db->group_by("banner_id");
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $attrs = array(
                    "banner_id"   => $result->banner_id,
                    "report_type" => 'day',
                    "year"        => $year,
                    "month"       => $month,
                    "week"        => $week,
                    "day"         => $day,
                    "action"      => 'view',
                    "stat"        => $result->sum_stat,
                );
                $this->ci->db->insert(TABLE_BANNERS_STAT_GENERAL, $attrs);
            }
        }

        /// clicks
        $this->ci->db->select("banner_id, SUM(stat) AS sum_stat")->from(TABLE_BANNERS_STAT_HOURLY);
        $this->ci->db->where("date", $date);
        $this->ci->db->where("action", 'click');
        $this->ci->db->group_by("banner_id");
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $attrs = array(
                    "banner_id"   => $result->banner_id,
                    "report_type" => 'day',
                    "year"        => $year,
                    "month"       => $month,
                    "week"        => $week,
                    "day"         => $day,
                    "action"      => 'click',
                    "stat"        => $result->sum_stat,
                );
                $this->ci->db->insert(TABLE_BANNERS_STAT_GENERAL, $attrs);
            }
        }
    }

    /**
     * Update banners statistics for week
     *
     * @param string $date date value
     *
     * @return void
     */
    public function updateWeekStatistic($date)
    {
        $uts = strtotime($date);
        $first_weekday = $this->get_first_weekday_uts($uts);
        $last_weekday = $this->get_first_weekday_uts($uts) + 6 * 24 * 60 * 60;
        $year = date("Y", $first_weekday);
        $month = date("m", $first_weekday);
        $week = date("W", $first_weekday);
        $this->ci->db->where("year", $year);
        $this->ci->db->where("month", $month);
        $this->ci->db->where("week", $week);
        $this->ci->db->where("report_type", 'week');
        $this->ci->db->delete(TABLE_BANNERS_STAT_GENERAL);

        if (date("m", $first_weekday) != date("m", $last_weekday)) {
            $sql = "( ( `month`='" . intval(date("m", $first_weekday)) . "' AND `year`='" . date("Y", $first_weekday) . "' ) OR ( `month`='" . intval(date("m", $last_weekday)) . "' AND `year`='" . date("Y", $last_weekday) . "' ) )";
        } else {
            $sql = "(`month`='" . intval(date("m", $first_weekday)) . "' AND `year`='" . date("Y", $first_weekday) . "')";
        }

        /// views
        $this->ci->db->select("banner_id, SUM(stat) AS sum_stat")->from(TABLE_BANNERS_STAT_GENERAL)->where($sql)->where("week", $week)->where("report_type", 'day')->where("action", 'view');
        $this->ci->db->group_by("banner_id");
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $attrs = array(
                    "banner_id"   => $result->banner_id,
                    "report_type" => 'week',
                    "year"        => $year,
                    "month"       => $month,
                    "week"        => $week,
                    "day"         => '',
                    "action"      => 'view',
                    "stat"        => $result->sum_stat,
                );
                $this->ci->db->insert(TABLE_BANNERS_STAT_GENERAL, $attrs);
            }
        }

        //// clicks
        $this->ci->db->select("banner_id, SUM(stat) AS sum_stat")->from(TABLE_BANNERS_STAT_GENERAL)->where($sql)->where("week", $week)->where("report_type", 'day')->where("action", 'click');
        $this->ci->db->group_by("banner_id");
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $attrs = array(
                    "banner_id"   => $result->banner_id,
                    "report_type" => 'week',
                    "year"        => $year,
                    "month"       => $month,
                    "week"        => $week,
                    "day"         => '',
                    "action"      => 'click',
                    "stat"        => $result->sum_stat,
                );
                $this->ci->db->insert(TABLE_BANNERS_STAT_GENERAL, $attrs);
            }
        }
    }

    /**
     * Update banners statistics for month
     *
     * @param string $date date value
     *
     * @return void
     */
    public function updateMonthStatistic($date)
    {
        $uts = strtotime($date);
        $year = date("Y", $uts);
        $month = date("m", $uts);
        $this->ci->db->where("year", $year);
        $this->ci->db->where("month", $month);
        $this->ci->db->where("report_type", 'month');
        $this->ci->db->delete(TABLE_BANNERS_STAT_GENERAL);

        /// views
        $this->ci->db->select("banner_id, SUM(stat) AS sum_stat")->from(TABLE_BANNERS_STAT_GENERAL)->where("year", $year)->where("month", $month)->where("report_type", 'day')->where("action", 'view');
        $this->ci->db->group_by("banner_id");
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $attrs = array(
                    "banner_id"   => $result->banner_id,
                    "report_type" => 'month',
                    "year"        => $year,
                    "month"       => $month,
                    "week"        => '',
                    "day"         => '',
                    "action"      => 'view',
                    "stat"        => $result->sum_stat,
                );
                $this->ci->db->insert(TABLE_BANNERS_STAT_GENERAL, $attrs);
            }
        }

        /// clicks
        $this->ci->db->select("banner_id, SUM(stat) AS sum_stat")->from(TABLE_BANNERS_STAT_GENERAL)->where("year", $year)->where("month", $month)->where("report_type", 'day')->where("action", 'click');
        $this->ci->db->group_by("banner_id");
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $attrs = array(
                    "banner_id"   => $result->banner_id,
                    "report_type" => 'month',
                    "year"        => $year,
                    "month"       => $month,
                    "week"        => '',
                    "day"         => '',
                    "action"      => 'click',
                    "stat"        => $result->sum_stat,
                );
                $this->ci->db->insert(TABLE_BANNERS_STAT_GENERAL, $attrs);
            }
        }
    }

    /**
     * Update banners statistics for year
     *
     * @param string $date date value
     *
     * @return void
     */
    public function updateYearStatistic($date)
    {
        $uts = strtotime($date);
        $year = date("Y", $uts);
        $this->ci->db->where("year", $year);
        $this->ci->db->where("report_type", 'year');
        $this->ci->db->delete(TABLE_BANNERS_STAT_GENERAL);

        /// views
        $this->ci->db->select("banner_id, SUM(stat) AS sum_stat")->from(TABLE_BANNERS_STAT_GENERAL)->where("year", $year)->where("report_type", 'month')->where("action", 'view');
        $this->ci->db->group_by("banner_id");
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $attrs = array(
                    "banner_id"   => $result->banner_id,
                    "report_type" => 'year',
                    "year"        => $year,
                    "month"       => '',
                    "week"        => '',
                    "day"         => '',
                    "action"      => 'view',
                    "stat"        => $result->sum_stat,
                );
                $this->ci->db->insert(TABLE_BANNERS_STAT_GENERAL, $attrs);
            }
        }

        /// clicks
        $this->ci->db->select("banner_id, SUM(stat) AS sum_stat")->from(TABLE_BANNERS_STAT_GENERAL)->where("year", $year)->where("report_type", 'month')->where("action", 'click');
        $this->ci->db->group_by("banner_id");
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $attrs = array(
                    "banner_id"   => $result->banner_id,
                    "report_type" => 'year',
                    "year"        => $year,
                    "month"       => '',
                    "week"        => '',
                    "day"         => '',
                    "action"      => 'click',
                    "stat"        => $result->sum_stat,
                );
                $this->ci->db->insert(TABLE_BANNERS_STAT_GENERAL, $attrs);
            }
        }

        return;
    }

    /**
     * Return unix timestamp of week start day
     *
     * @param integer $uts unix timestamp
     *
     * @return integer
     */
    public function getFirstWeekdayUts($uts)
    {
        $w = date("w", $uts);
        $w = ($w == 0) ? 6 : ($w - 1);
        $uts = $uts - $w * 24 * 60 * 60;

        return $uts;
    }

    /**
     * Return banner statistic for day
     *
     * @param integer $banner_id banner identifier
     * @param integer $year      year value
     * @param integer $month     month value
     * @param integer $day       day value
     *
     * @return array
     */
    public function getDayStatistic($banner_id, $year, $month, $day)
    {
        $statistic["all"]["click"] = 0;
        $statistic["all"]["view"] = 0;
        for ($i = 0; $i < 24; ++$i) {
            $statistic["hour"][$i]["view"] = 0;
            $statistic["hour"][$i]["click"] = 0;
        }

        $this->ci->db->select("stat, action")->from(TABLE_BANNERS_STAT_GENERAL)->where("banner_id", $banner_id)->where("year", $year)->where("month", $month)->where("day", $day)->where("report_type", 'day');
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $statistic["all"][$result->action] = intval($result->stat);
            }
        }

        $date = sprintf("%04d-%02d-%02d", $year, $month, $day);
        $this->ci->db->select("hour, stat, action")->from(TABLE_BANNERS_STAT_HOURLY)->where("banner_id", $banner_id)->where("date", $date);
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $statistic["hour"][intval($result->hour)][$result->action] = intval($result->stat);
            }
        }

        return $statistic;
    }

    /**
     * Return banner statistic for week
     *
     * @param integer $banner_id banner identifier
     * @param integer $year      year value
     * @param integer $week      week value
     *
     * @return array
     */
    public function getWeekStatistic($banner_id, $year, $week)
    {
        $statistic["all"]["click"] = 0;
        $statistic["all"]["view"] = 0;

        $this->ci->db->select("stat, action")->from(TABLE_BANNERS_STAT_GENERAL)->where("banner_id", $banner_id)->where("year", $year)->where("week", $week)->where("report_type", 'week');
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $statistic["all"][$result->action] = intval($result->stat);
            }
        }

        $first_weekday = strtotime($year . '0104 +' . ($week - 1)  . ' weeks');
        $first_weekday = $this->get_first_weekday_uts($first_weekday);
        $last_weekday = $first_weekday + 6 * 24 * 60 * 60;

        if (date("m", $first_weekday) != date("m", $last_weekday)) {
            $sql = "( ( `month`='" . intval(date("m", $first_weekday)) . "' AND `year`='" . date("Y", $first_weekday) . "' ) OR ( `month`='" . intval(date("m", $last_weekday)) . "' AND `year`='" . date("Y", $last_weekday) . "' ) )";
        } else {
            $sql = "(`month`='" . intval(date("m", $first_weekday)) . "' AND `year`='" . date("Y", $first_weekday) . "')";
        }

        for ($i = 1; $i <= 7; ++$i) {
            $statistic["day"][$i]["view"] = 0;
            $statistic["day"][$i]["click"] = 0;
            $statistic["day"][$i]["date"] = date("Y-m-d", $first_weekday + ($i - 1) * 24 * 60 * 60);
        }

        $this->ci->db->select("year, month, day, action, stat")->from(TABLE_BANNERS_STAT_GENERAL)->where("banner_id", $banner_id)->where($sql)->where("week", $week)->where("report_type", 'day');
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $date = $result->year . "-" . $result->month . "-" . $result->day;
                $uts = strtotime($date);
                $w = date("w", $uts);
                $w = ($w == 0) ? 7 : $w;
                $statistic["day"][$w][$result->action] = intval($result->stat);
            }
        }

        return $statistic;
    }

    /**
     * Return banner statistic for month
     *
     * @param integer $banner_id banner identifier
     * @param integer $year      year value
     * @param integer $month     month value
     *
     * @return array
     */
    public function getMonthStatistic($banner_id, $year, $month)
    {
        $statistic["all"]["click"] = 0;
        $statistic["all"]["view"] = 0;

        $this->ci->db->select("stat, action")->from(TABLE_BANNERS_STAT_GENERAL)->where("banner_id", $banner_id)->where("year", $year)->where("month", $month)->where("report_type", 'month');
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $statistic["all"][$result->action] = intval($result->stat);
            }
        }

        /// by day
        $uts = mktime(0, 0, 0, $month, 1, $year);
        for ($i = 1; $i <= date("t", $uts); ++$i) {
            $statistic["day"][$i]["view"] = 0;
            $statistic["day"][$i]["click"] = 0;
            $statistic["day"][$i]["date"] = date("Y-m-d", mktime(0, 0, 0, $month, $i, $year));
            $week = intval(date("W", mktime(0, 0, 0, $month, $i, $year)));
            if (!isset($statistic["week"][intval($week)])) {
                $first_weekday = strtotime($year . '0104 +' . ($week - 1)  . ' weeks');
                $first_weekday = $this->get_first_weekday_uts($first_weekday);
                $last_weekday = $first_weekday + 6 * 24 * 60 * 60;
                if ($first_weekday < $uts) {
                    $first_weekday = $uts;
                }
                if ($last_weekday >= mktime(0, 0, 0, $month + 1, 1, $year)) {
                    $last_weekday = mktime(0, 0, 0, $month + 1, 0, $year);
                }
                $statistic["week"][$week]["view"] = 0;
                $statistic["week"][intval($week)]["click"] = 0;
                $statistic["week"][$week]["start_day"] = strftime("%d %b %Y", $first_weekday);
                $statistic["week"][$week]["end_day"] = strftime("%d %b %Y", $last_weekday);
            }
        }
        $this->ci->db->select("year, month, day, action, stat")->from(TABLE_BANNERS_STAT_GENERAL)->where("banner_id", $banner_id)->where("year", $year)->where("month", $month)->where("report_type", 'day');
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $date = $result->year . "-" . $result->month . "-" . $result->day;
                $statistic["day"][intval($result->day)][$result->action] = intval($result->stat);
                $week = date("W", mktime(0, 0, 0, $result->month, $result->day, $result->year));
                $statistic["week"][$week][$result->action] += intval($result->stat);
            }
        }

        return $statistic;
    }

    /**
     * Return  banner statistic for year
     *
     * @param integer $banner_id banner identifier
     * @param integer $year      year value
     *
     * @return array
     */
    public function getYearStatistic($banner_id, $year)
    {
        $statistic["all"]["click"] = 0;
        $statistic["all"]["view"] = 0;

        $this->ci->db->select("stat, action")->from(TABLE_BANNERS_STAT_GENERAL)->where("banner_id", $banner_id)->where("year", $year)->where("report_type", 'year');
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $statistic["all"][$result->action] = intval($result->stat);
            }
        }

        //// by month
        for ($i = 1; $i <= 12; ++$i) {
            $statistic["month"][$i]["view"] = 0;
            $statistic["month"][$i]["click"] = 0;
            $statistic["month"][$i]["month"] = strftime("%b %Y", mktime(0, 0, 0, $i, 1, $year));
        }
        $this->ci->db->select("year, month, action, stat")->from(TABLE_BANNERS_STAT_GENERAL)->where("banner_id", $banner_id)->where("year", $year)->where("report_type", 'month');
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $statistic["month"][intval($result->month)][$result->action] = intval($result->stat);
            }
        }

        /// by weeks
        $last_week = date("W", mktime(0, 0, 0, 12, 31, $year));
        for ($i = 1; $i <= $last_week; ++$i) {
            $statistic["week"][$i]["view"] = 0;
            $statistic["week"][$i]["click"] = 0;
            $first_weekday = strtotime($year . '0104 +' . ($i - 1)  . ' weeks');
            $first_weekday = $this->get_first_weekday_uts($first_weekday);
            $last_weekday = $first_weekday + 6 * 24 * 60 * 60;
            $statistic["week"][$i]["start_day"] = strftime("%d %b %Y", $first_weekday);
            $statistic["week"][$i]["end_day"] = strftime("%d %b %Y", $last_weekday);
        }
        $this->ci->db->select("year, month, week, action, stat")->from(TABLE_BANNERS_STAT_GENERAL)->where("banner_id", $banner_id)->where("year", $year)->where("report_type", 'week');
        $results = $this->ci->db->get()->result();
        if (!empty($results) && is_array($results)) {
            foreach ($results as $result) {
                $statistic["week"][intval($result->week)][$result->action] = intval($result->stat);
            }
        }

        return $statistic;
    }

    /**
     * Clear banner statistics
     *
     * @param integer $banner_id banner statistics
     *
     * @return void
     */
    public function deleteStatistic($banner_id)
    {
        $this->ci->db->delete(TABLE_BANNERS_STAT_GENERAL, array('banner_id' => $banner_id));
        $this->ci->db->delete(TABLE_BANNERS_STAT_HOURLY, array('banner_id' => $banner_id));
        $this->ci->db->delete(TABLE_BANNERS_STAT_TEMP, array('banner_id' => $banner_id));
    }

    /**
     * Clear banner statistics
     *
     * @param integer $banner_id banner statistics
     *
     * @return void
     */
    public function deleteStatisticBanners($banner_ids)
    {
        $this->ci->db->where_in('banner_id', $banner_ids);
        $this->ci->db->delete(TABLE_BANNERS_STAT_GENERAL);

        $this->ci->db->where_in('banner_id', $banner_ids);
        $this->ci->db->delete(TABLE_BANNERS_STAT_HOURLY);

        $this->ci->db->where_in('banner_id', $banner_ids);
        $this->ci->db->delete(TABLE_BANNERS_STAT_TEMP);
    }

    public function __call($name, $args)
    {
        $methods = [
            'add_hit' => 'addHit',
            'add_view' => 'addView',
            'delete_statistic' => 'deleteStatistic',
            'get_day_statistic' => 'getDayStatistic',
            'get_first_weekday_uts' => 'getFirstWeekdayUts',
            'get_month_statistic' => 'getMonthStatistic',
            'get_week_statistic' => 'getWeekStatistic',
            'get_year_statistic' => 'getYearStatistic',
            'update_day_statistic' => 'updateDayStatistic',
            'update_file_statistic' => 'updateFileStatistic',
            'update_month_statistic' => 'updateMonthStatistic',
            'update_week_statistic' => 'updateWeekStatistic',
            'update_year_statistic' => 'updateYearStatistic',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
