<?php

namespace App;

class Call
{
    private $phoneNumber;

    function __construct($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function IsValidCall()
    {
        return !empty($this->phoneNumber);
    }
}