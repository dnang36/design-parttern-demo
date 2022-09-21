<?php

namespace ngdang\cretional\factoryMethod;
use ngdang\cretional\factoryMethod\interview;

abstract class hiringManager{
     abstract protected function makeInterview(): interview;

    public function takeInterview()
    {
        $interviewer = $this->makeInterview();
        $interviewer->askQuestion();
     }
}