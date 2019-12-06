<?php

namespace App\Traits;

trait Singleton
{
    private static $instance = null;

    public static function getInstance()
    {
        if (!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }



}
