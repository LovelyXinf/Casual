<?php
namespace Pg\Libraries\Minify\Drivers\Js\ClosureCompiler;

class Compiler
{

    const COMPILATION_LEVEL = "SIMPLE_OPTIMIZATIONS";

    /**
     * @var Singleton
     */
    private static $instance;
    private $compiler = LIBPATH . 'Minify/Drivers/Js/ClosureCompiler/closure-compiler.jar';
    private $js_output_file = '.min.js';
    private $js_output_path = TEMP_FOLDER . 'minifier/js/';
    private $scripts = [];

    public function add($scripts, $name)
    {        
        if ($_ENV['RESET_MINIFY']) {        
            foreach ($scripts as $script) {
                $this->scripts[$name][] = ' --js ' . str_replace('/js/../', '/', $script);
            }
        }
        return $this;
    }

    private function output($name)
    {
        return $this->js_output_path . $name . $this->js_output_file;
    }

    public function compile($name)
    {
        if (!empty($this->scripts[$name])) {
                                        //compiler      
            exec('java -jar ' . $this->compiler .
            //compilation level ( WHITESPACE_ONLY, SIMPLE_OPTIMIZATIONS, ADVANCED_OPTIMIZATIONS)
            ' --compilation_level ' . self::COMPILATION_LEVEL .
                                                      //input js files
            implode('', array_unique($this->scripts[$name])) .
                                            //output js file
            ' --js_output_file ' . $this->output($name) . ' 2>&1', $out);echo"<pre>";print_r($out);echo"</pre>";
        }
        return $this;
    }
    
    public function load($name, $is_path = false)
    {
        if (file_exists($name)) {
            if ($is_path !== false) {
                return '/' . $this->output($name);
            } else {
                return '<script type="text/javascript" src="/' . $this->output($name) . '"></script>' . "\n";
            }
        }
    }

    public function isEmptyScripts()
    {
        return empty($this->scripts);
    }

    public function get()
    {
        return $this->scripts;
    }

    public static function &getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * is not allowed to call from outside to prevent from creating multiple instances,
     * to use the singleton, you have to obtain the instance from Singleton::getInstance() instead
     */
    private function __construct()
    {
        
    }

    /**
     * prevent the instance from being cloned (which would create a second instance of it)
     */
    private function __clone()
    {
        
    }

    /**
     * prevent from being unserialized (which would create a second instance of it)
     */
    private function __wakeup()
    {
        
    }
}
