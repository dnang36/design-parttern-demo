<?php

namespace ngdang\cretional\factoryMethod;

class socialNetwork{
    public static function driver($type)
    {
        if ($type='facebook'){
            return new facebook();
        }elseif ($type='google'){
            return new google();
        }
    }
}