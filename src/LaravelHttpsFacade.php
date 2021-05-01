<?php

namespace Benjaber98\LaravelHttps;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Benjaber98\LaravelHttps\LaravelHttps
 */
class LaravelHttpsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-https';
    }
}
