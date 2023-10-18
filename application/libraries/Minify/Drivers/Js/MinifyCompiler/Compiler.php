<?php
namespace Pg\Libraries\Minify\Drivers\Js\MinifyCompiler;

class Compiler
{
    /**
     * DIRECTORY_SEPARATOR
     * 
     * @var DIRECTORY_SEPARATOR
     */
    const DS = DIRECTORY_SEPARATOR;

    /**
     *  instance of the class
     */
    private static $instance;
    
    /**
     *
     * @var object 
     */
    private $minifier;
    
    /**
     *
     * @var string 
     */
    private $output_url = TEMPPATH_VIRTUAL . 'minifier/';
    
    /**
     *
     * @var string 
     */
    private $output_path = TEMPPATH . 'minifier/';
    
    /**
     *
     * @var string 
     */
    private $output_folder = '/' . SITE_SUBFOLDER . TEMP_FOLDER . 'minifier/';
    
    /**
     * Scripts
     *
     * @var array
     */
    private $files = [];
    
    /**
     * Strtotime
     * 
     * @var string
     */
    private $strtotime = '';

    /**
     * Add js files
     * 
     * @param array $files
     * @param string $name
     * 
     * @return $this
     */
    public function add($files, $name)
    {             
        foreach ($files as $file) {
            $this->files[$name][] = $file;
        }
        return $this;
    }

    /**
     * Output js file path
     * 
     * @param string $name
     * @param boolean $is_path
     * 
     * @return string
     */
    private function output($name, $is_path = false)
    {
        $format_name = $this->formatName($name);
        if ($_ENV['RESET_MINIFY']) {
            $format_name .= '?' . $this->strtotime;
        }
        return ($is_path !== false) ? $this->output_folder . $format_name : $this->output_url . $format_name;
    }
    
    /**
     * Name formatting
     * 
     * @param type $name
     * 
     * @return type
     */
    private function formatName($name)
    {
        if (strripos($name, 'js/../') !== false) {
            return str_replace('js/../', '', $name);
        }
        return $name;
    }

    /**
     * Compile output  file
     * 
     * @param string $name
     * 
     * @return $this
     */
    public function compile($name)
    {
        if (!empty($this->files[$name])) {
            foreach ($this->files[$name] as $file) {
                $this->minifier->add(SITE_PHYSICAL_PATH . $file);
            }
            $output = $this->minifier->minify();
            if (!file_exists(dirname($this->output_path . $name))) {
                mkdir(dirname($this->output_path . $name), 0755, true);
            }
            
            file_put_contents($this->output_path . $name, $output);     
            $this->reset();
        }
        return $this;
    }
    
    /**
     * Load data
     * 
     * @param string $name
     * @param boolean $is_path
     * @param string $type_load
     * 
     * @return string
     */
    public function load($name, $is_path = false, $type_load = '')
    {
        if ($is_path === true ) {
            return $this->output($name, $is_path);
        } else {
            return '<script ' . $type_load . ' type="text/javascript" src="' . $this->output($name, $is_path) . '"></script>' . "\n";
        }
    }
    
    /**
     * Reset minifier
     * 
     * return void
     */
    public function reset()
    {
        $this->minifier = new \MatthiasMullie\Minify\JS();
    }

    /**
     * Returns the Singleton instance of this class.
     *
     * @return Singleton instance.
     */
    public static function &getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Protected constructor to prevent creating a new instance of the
     *
     * Singleton via the `new` operator from outside of this class.
     */
    private function __construct()
    {
        $this->minifier = new \MatthiasMullie\Minify\JS();
        $this->strtotime = strtotime('now');
    }

    /**
     * Private clone method to prevent cloning of the instance of the Singleton instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the Singleton instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
}
