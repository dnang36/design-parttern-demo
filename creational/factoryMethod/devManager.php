<?php

namespace ngdang\cretional\factoryMethod;

class devManager extends hiringManager {

    protected function makeInterview(): interview
    {
        // TODO: Implement makeInterview() method.
        return new developer();
    }
}