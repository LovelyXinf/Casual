<?php

namespace Pg\modules\video_uploads\models;

define('VIDEOS_PROCESS_TABLE', DB_PREFIX . 'videos_process');

/**
 * Video uploads process model
 *
 * @package PG_Dating
 * @subpackage application
 *
 * @category    modules
 *
 * @copyright Pilot Group <http://www.pilotgroup.net/>
 * @author Katya Kashkova <katya@pilotgroup.net>
 *
 * @version $Revision: 2 $ $Date: 2010-04-02 15:07:07 +0300 (Ср, 02 апр 2010) $ $Author: kkashkova $
 */
class VideoUploadsProcessModel extends \Model
{
    private $cron_time_limit = 240; //4*60

    private $timers = [];

    /**
     * Какие бывают статусы обработки (соотв они же передаются в callback)
     * 1. start - процесс не начат
     * 2. processing - файл конвертируется либо заливается на ютуб
     * 3. waiting - ожидает данных (например конвертации ютуба)
     * 4. images - ожидает нарезки картинок
     * 5. end - обработка полностью завершена
     */
    public function __construct()
    {
        parent::__construct();
        //// конфиги берем из Video_uploads_model (а не напрямую из Video_uploads_config_model), потому что в основной модели конфиг кэшируется
        $this->ci->load->model(['Video_uploads_model',
            'video_uploads/models/Video_uploads_local_model',
            'video_uploads/models/Video_uploads_youtube_model']);
    }

    /**
     * file_data должен содержать
     * ext - расширение
     * type - mime-тип
     *
     * file_data также может содержать
     * name - название
     * description - описание
     * tags - строка, тэги разделены запятыми
     * lat, lon - широта и долгота
     */
    public function prepare($file_name, $file_path, $file_data, $id_object, $video_upload_gid)
    {
        /// исходя из настроек
        /// если не нужно ни заливать, ни конвертировать, ни резать картинки, то статус 'end'
        /// если нужно заливать -  статус start
        /// если нужно конвертировать -  статус start
        /// если нужно конвертировать но файл уже в flv добавление процесса - статус images (если же не надо резать картинки, то ничего не делаем. вызываем колбэк со статусом 'end' )
        /// смотрим статус
        ///  если end то процесс не добавляем
        ///  если !end добавляем процесс
        /// Вызываем колбэк с нужным статусом и данными

        $config = $this->ci->Video_uploads_model->get_config($video_upload_gid);
        if (empty($config)) {
            return false;
        }

        $status = "end";

        if ($config["upload_type"] == 'local') {
            if ($config["use_convert"]) {
                $status = "start";
            }
            if ($file_data["ext"] == 'flv') {
                $status = "end";

                if ($config["use_thumbs"]) {
                    $status = "images";
                }

                $this->ci->load->model('video_uploads/models/Video_uploads_settings_model');
                if ($this->ci->Video_uploads_settings_model->get_settings('use_local_converting_video')) {
                    $convert_type = $this->ci->Video_uploads_settings_model->get_settings('local_converting_video_type');
                    if ($convert_type == 'ffmpeg') {
                        $status = "start";
                    }
                }
            }
        }

        if ($config["upload_type"] == 'youtube') {
            $status = "start";
        }

        $data = array(
            'file_name'        => $file_name,
            'file_path'        => $file_path,
            'file_data'        => $file_data,
            'status'           => $status,
            'id_object'        => $id_object,
            'video_upload_gid' => $video_upload_gid,
        );

        if ($status != 'end') {
            $this->save_process(null, $data);
        }

        if ($config["upload_type"] == 'local') {
            if ($file_data["ext"] == 'flv') {
                $status = 'end';
            }
            $data['isHTML5'] = 0;
        }

        $callback_data = $data;
        $callback_data["video"] = $file_name;
        $callback_data["upload_type"] = $config["upload_type"];
        $this->get_callback($config["module"], $config["model"], $config["method_status"], $id_object, $status, $callback_data);
    }

    public function cronProcessingMethod()
    {
        /// работаем в цикле, засекаем время
        /// узнаем тип аплода
        ///     если локальное то конвертируем (сама конвертация + мета инфа)
        ///     если youtube то заливаем
        /// меняем статус
        ///     если локальное - то процесс либо удаяляется либо уходит в images (обработки(waiting) нет - уже сконвертировали)
        ///     если ютуб - то процесс переходит в статус waiting (ждем когда ютуб обработает)
        /// вызываем колбэк
        /// смотрим на время , если прошло больше лимита - выходим

        $this->setTimer('processing');

        while ($this->getTimer('processing') < $this->cron_time_limit) {
            //// get process
            $process = $this->get_process_by_status('start');

            if (empty($process)) {
                break;
            }

            //// set as 'processing'
            $save_temp_data["status"] = "processing";
            $this->save_process($process["id"], $save_temp_data);

            //// get config
            $config = $this->ci->Video_uploads_model->get_config($process["video_upload_gid"]);

            if ($config["upload_type"] == 'local') {
                $return = $this->ci->Video_uploads_local_model->processing_method($process["file_name"], $process["file_path"], $process["file_data"], $config);
            }

            if ($config["upload_type"] == 'youtube') {
                $return = $this->ci->Video_uploads_youtube_model->processing_method($process["file_name"], $process["file_path"], $process["file_data"], $config);
            }
            //// if errors
            if (!empty($return["errors"])) {
                $status = "end";
                $data = array();
                $errors = $return["errors"];
            } else {
                $data = $return['data'];
                $errors = array();

                if ($config["upload_type"] == 'local') {
                    $status = "end";
                }
                if ($config["upload_type"] == 'youtube') {
                    $status = "waiting";
                }

                if (!empty($data['image'])) {
                    $this->ci->Video_uploads_model->create_thumbs($data['image'], $process["file_path"], $config["thumbs_settings"]);
                }
            }

            if ($status == "end") {
                $this->delete_process($process['id']);
            } else {
                $process_data = array(
                    'file_name' => $data["video"],
                    'status'    => $status,
                );
                $this->save_process($process['id'], $process_data);
            }
            $data['file_data'] = $process['file_data'];
            $this->get_callback($config["module"], $config["model"], $config["method_status"], $process["id_object"], $status, $data, $errors);
        }

        return;
    }

    public function cronWaitingMethod()
    {
        /// работаем в цикле, засекаем время
        /// узнаем тип аплода
        ///     если локальное то ничего не делаем
        ///     если youtube то запрашиваем инфу о файле, если картинки появились то значит файл сконвертился
        /// меняем статус (если нужно резать картинки) либо удаляем процесс
        /// вызываем колбэк
        /// смотрим на время , если прошло больше лимита - выходим
        $this->setTimer('waiting');
        while ($this->getTimer('waiting') < $this->cron_time_limit) {
            //// get process
            $process = $this->get_process_by_status('waiting');

            if (empty($process)) {
                break;
            }

            //// get config
            $config = $this->ci->Video_uploads_model->get_config($process["video_upload_gid"]);

            if ($config["upload_type"] == 'local') {
                if ($config["use_thumbs"]) {
                    $status = "images";
                } else {
                    $status = "end";
                }
                $data = array();
                $errors = array();
            }

            if ($config["upload_type"] == 'youtube') {
                $status = 'waiting';
                $return = $this->ci->Video_uploads_youtube_model->waiting_method($process["file_name"], $process["file_path"]);

                //// if errors
                if (!empty($return["data"]["image"])) {
                    $this->ci->Video_uploads_model->create_thumbs($return["data"]["image"], $process["file_path"], $config["thumbs_settings"]);
                    $data["image"] = $return["data"]["image"];
                    $status = "end";
                } elseif (!empty($return["errors"])) {
                    $status = "end";
                    $errors = $return["errors"];
                }
            }

            if ($status == 'end') {
                $this->delete_process($process['id']);
            } elseif ($status != 'waiting') {
                $process_data['status'] = $status;
                $this->save_process($process['id'], $process_data);
            } elseif ($status == 'waiting') {
                $process_data["wait_counter"] = $process['wait_counter'] + 1;
                $this->save_process($process['id'], $process_data);
            }

            if ($status != 'waiting') {
                $data['file_data'] = $process['file_data'];
                $this->get_callback($config["module"], $config["model"], $config["method_status"], $process["id_object"], $status, $data, $errors);
            }

            sleep(5);
        }

        return;
    }

    public function cronImagesMethod()
    {
        
        /// работаем в цикле, засекаем время
        /// узнаем тип аплода
        ///     если локальное то выдираем картинки и создаем тамбы , промежуточные файлы удаляем
        ///     если youtube то запрашиваем инфу о файле, сохраняем на локал картинки, создаем тамбы
        /// удаляем запись из процессов
        /// вызываем колбэк
        /// смотрим на время , если прошло больше лимита - выходим
        $this->setTimer('images');
        while ($this->getTimer('images') < $this->cron_time_limit) {
            //// get process
            $process = $this->getProcessByStatus('images');
            if (empty($process)) {
                break;
            }

            //// set as 'processing'
            $save_temp_data["status"] = "end";
            $this->saveProcess($process["id"], $save_temp_data);

            //// get config
            $config = $this->ci->Video_uploads_model->getConfig($process["video_upload_gid"]);

            if ($config["upload_type"] == 'local') {
                $return = $this->ci->Video_uploads_local_model->imagesMethod($process["file_name"], $process["file_path"], $config);
            }

            if ($config["upload_type"] == 'youtube') {
                $return = $this->ci->Video_uploads_youtube_model->imagesMethod($process["file_name"], $process["file_path"]);
            }

            //// if errors
            $status = 'end';
            if (!empty($return["data"]["image"])) {
                $this->ci->Video_uploads_model->createThumbs($return["data"]["image"], $process["file_path"], $config["thumbs_settings"]);
                $data["image"] = $return["data"]["image"];
            } else {
                $data["image"] = "";
            }

            $this->deleteProcess($process['id']);
            $data['file_data'] = $process['file_data'];
            $this->getCallback($config["module"], $config["model"], $config["method_status"], $process["id_object"], $status, $data, $errors);
        }

        return;
    }

    /**
     * методы получения данных из процессов
     */
    public function getProcessList($params = array(), $order_by = null, $items_on_page = null, $page = 1)
    {
        $this->ci->db->select('id, file_name, file_path, file_data, id_object, video_upload_gid, status, wait_counter, date_add')->from(VIDEOS_PROCESS_TABLE);

        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value);
            }
        }

        if (is_array($order_by) && count($order_by) > 0) {
            foreach ($order_by as $field => $dir) {
                $this->ci->db->order_by($field . " " . $dir);
            }
        }

        if (!is_null($items_on_page)) {
            $page = intval($page) ? intval($page) : 1;
            $this->ci->db->limit($items_on_page, $items_on_page * ($page - 1));
        }
        $results = $this->ci->db->get()->result_array();
        if (!empty($results) && is_array($results)) {
            return $results;
        }

        return false;
    }

    public function getProcessCount($params = array())
    {
        $this->ci->db->select('COUNT(*) AS cnt')->from(VIDEOS_PROCESS_TABLE);

        if (isset($params["where"]) && is_array($params["where"]) && count($params["where"])) {
            foreach ($params["where"] as $field => $value) {
                $this->ci->db->where($field, $value);
            }
        }

        if (isset($params["where_in"]) && is_array($params["where_in"]) && count($params["where_in"])) {
            foreach ($params["where_in"] as $field => $value) {
                $this->ci->db->where_in($field, $value);
            }
        }

        if (isset($params["where_sql"]) && is_array($params["where_sql"]) && count($params["where_sql"])) {
            foreach ($params["where_sql"] as $value) {
                $this->ci->db->where($value);
            }
        }

        $results = $this->ci->db->get()->result_array();
        if (!empty($result)) {
            return intval($result[0]->cnt);
        } else {
            return 0;
        }
    }

    public function getProcessById($id)
    {
        $data = array();
        $result = $this->ci->db->select('id, file_name, file_path, file_data, id_object, video_upload_gid, status, wait_counter, date_add')->from(VIDEOS_PROCESS_TABLE)->where("id", $id)->get()->result_array();
        if (!empty($result)) {
            $data = $result[0];
            $data["file_data"] = unserialize($data["file_data"]);
        }

        return $data;
    }

    public function getProcessByStatus($status = 'start')
    {
        $data = [];
        $result = $this->ci->db->select('id, file_name, file_path, file_data, id_object, video_upload_gid, status, wait_counter, date_add')->from(VIDEOS_PROCESS_TABLE)->where("status", $status)->order_by('wait_counter ASC')->get()->result_array();
        if (!empty($result)) {
            $data = $result[0];
            $data["file_data"] = unserialize($data["file_data"]);
        }

        return $data;
    }

    public function saveProcess($id, $data)
    {
        if (isset($data["file_data"]) && is_array($data["file_data"])) {
            $data["file_data"] = serialize($data["file_data"]);
        }

        if (empty($id)) {
            $data["date_add"] = date("Y-m-d H:i:s");
            $this->ci->db->insert(VIDEOS_PROCESS_TABLE, $data);
            $id = $this->ci->db->insert_id();
        } else {
            $this->ci->db->where('id', $id);
            $this->ci->db->update(VIDEOS_PROCESS_TABLE, $data);
        }

        return $id;
    }

    public function deleteProcess($id)
    {
        $this->ci->db->where('id', $id);
        $this->ci->db->delete(VIDEOS_PROCESS_TABLE);
    }

    /**
     * метод вызова колбэка
     */
    public function getCallback($module, $model, $method, $id_object, $status, $data = array(), $errors = array())
    {
        $model_url = $module . "/models/" . $model;
        $model_path = MODULEPATH . strtolower($model_url) . EXT;
        $this->ci->load->model($model_url);
        $function_result = call_user_func_array(array(&$this->ci->{$model}, $method), array($id_object, $status, $data, $errors));

        return;
    }

    private function setTimer($name)
    {
        $this->timers[$name] = $this->getMicrotime();
    }

    private function getTimer($name)
    {
        return $this->getMicrotime() - $this->timers[$name];
    }

    private function getMicrotime()
    {
        list($usec, $sec) = explode(" ", microtime());

        return ((float) $usec + (float) $sec);
    }

    public function __call($name, $args)
    {
        $methods = [
            'cron_images_method' => 'cronImagesMethod',
            'cron_processing_method' => 'cronProcessingMethod',
            'cron_waiting_method' => 'cronWaitingMethod',
            'delete_process' => 'deleteProcess',
            'get_callback' => 'getCallback',
            'get_process_by_id' => 'getProcessById',
            'get_process_by_status' => 'getProcessByStatus',
            'get_process_count' => 'getProcessCount',
            'get_process_list' => 'getProcessList',
            'save_process' => 'saveProcess',
        ];

        if (!isset($methods[$name])) {
            throw new \Exception('Unknown method ' . $method);
        }

        return call_user_func_array([$this, $methods[$name]], $args);
    }
}
