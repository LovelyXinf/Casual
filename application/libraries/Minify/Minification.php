<?php

namespace Pg\Libraries\Minify;

class Minification
{
    
    private $driver;
    
    public function __construct($driver)
    {
        $this->driver = $driver;
    }
    
    public function add($scripts, $name)
    {             
       return $this->driver->add($scripts, $name);
    }
    
    public function compile($name)
    {                    
        return $this->driver->compile($name);
    }
    
    public function load($name, $return = 'link', $type_load = '')
    {
        return $this->driver->load($name, $return, $type_load);
    }
    
}
