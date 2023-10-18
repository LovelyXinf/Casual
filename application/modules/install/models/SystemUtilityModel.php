<?php


namespace Pg\modules\install\models;

/**
 * Install module
 *
 * @package     PG_Core
 *
 * @copyright   Copyright (c) 2000-202prodG Core
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */

/**
 * Install Main Model
 *
 * @package     PG_Core
 * @subpackage  Install
 *
 * @category    models
 *
 * @copyright   Copyright (c) 2000-2020 PG Core
 * @author      Pilot Group Ltd <http://www.pilotgroup.net/>
 */

class SystemUtilityModel extends \Model
{

    const DS = DIRECTORY_SEPARATOR;

    /**
     * SystemUtilityModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getModulesData()
    {
         return $this->ci->pg_module->get_modules();
    }

    public function setModulesData($data)
    {
        foreach ($data as $gid => $new_version) {
            $content = $this->ci->Install_model->get_module_config($gid);
            $content['version'] = $new_version;
            $this->setFileData($content);
        }
    }

    private function setFileData($content)
    {
        $filePath = TEMP_FOLDER . 'modules/' . $content['module'] . '/install';
        $fullName = $filePath . '/module.php';

        if (!is_dir($filePath)) {
            mkdir($filePath, 0777, true);
        }
        if (!is_file($fullName)) {
            touch($fullName);
        }

        $start = <<<'EOD'
<?php

$module =
EOD;
        file_put_contents($fullName, $start . $this->varExport($content, true) . ';');
    }

    private function varExport($expression, $return = false) {
        $export = var_export($expression, true);
        $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
        $array = preg_split("/\r\n|\n|\r/", $export);
        $array = preg_replace(["/\s*array\s\($/", "/\)(,)?$/", "/\s=>\s$/"], [null, ']$1', ' => ['], $array);
        $export = join(PHP_EOL, array_filter(["["] + $array));
        if ((bool)$return) return $export; else echo $export;
    }
}