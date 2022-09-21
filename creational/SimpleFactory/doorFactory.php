<?php
namespace ngdang\cretional\simpleFactory;

class doorFactory{
    public static function makeDoor($width,$height): Door
    {
        return new wonderDoor($width,$height);
    }
}