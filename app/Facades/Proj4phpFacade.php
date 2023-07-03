<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Proj4phpFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'proj4php';
    }
}