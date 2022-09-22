<?php

namespace ngdang\cretional\singleton;

class singleton {
    protected static $instance;

    protected function __construct()
    {
        
    }

    public static function getInstancce()
    {
        if (!isset(static::$instance)) {
            echo "Creating Instance \n";
            static::$instance = new static;
        }
        echo "Returning instance \n";
        return static::$instance;
    }
}

singleton::getInstancce();