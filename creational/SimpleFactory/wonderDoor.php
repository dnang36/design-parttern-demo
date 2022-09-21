<?php

namespace ngdang\cretional\simpleFactory;

class wonderDoor implements Door{

    protected $width;
    protected $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth(): float
    {
        // TODO: Implement getWidth() method.
        return $this->width;
    }

    public function getHeight(): float
    {
        return $this->height;
    }
}