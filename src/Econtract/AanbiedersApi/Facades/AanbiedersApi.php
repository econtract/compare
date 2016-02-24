<?php namespace Econtract\AanbiedersApi\Facades;


use Illuminate\Support\Facades\Facade;

class AanbiedersApi extends Facade {

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'AanbiedersApi';
    }

}