<?php

namespace App\Facades\Bean\Facades;

use Illuminate\Support\Facades\Facade;

class Bean extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'bean';
    }
}