<?php
namespace Pg\Libraries\Minify\Drivers\Css\MinifyCompiler;

class Compiler
{

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
    private $output_path = TEMP_FOLDER . 'minifier/css/';
    
    /**
     * Files
     *
     * @var array
     */
    private $files = [];

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
     * Output css file path
     * 
     * @param string $name
     * 
     * @return string
     */
    private function output($name)
    {
        return $this->output_path . $name;
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
                $this->minifier->add($file);
            }
            $output = $this->minifier->minify();
            if (!is_dir($this->output_path)) {
                mkdir($this->output_path, 0755, true);
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
     * @param string $return
     * @param string $type_load
     * 
     * @return string
     */
    public function load($name, $is_path = false, $type_load = '')
    {
        if ($is_path === true) {
            return '/' . $this->output($name);
        } else {
            return '<link href="/' . $this->output($name) . '" rel="stylesheet" type="text/css" media="' . $type_load ?: 'all' . '">' . "\n";
        }
    }
    
    /**
     * Reset minifier
     * 
     * return void
     */
    public function reset()
    {
        $this->minifier = new \MatthiasMullie\Minify\CSS();
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
        $this->minifier = new \MatthiasMullie\Minify\CSS();
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
