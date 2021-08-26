<?php


namespace Source\Models;


use CoffeeCode\DataLayer\DataLayer;

class LogDAO extends DataLayer
{
    public function __construct()
    {
        parent::__construct("log", [ "log_content"], "log_id", false);
    }

}