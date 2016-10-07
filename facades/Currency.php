<?php namespace Responsiv\Currency\Facades;

use October\Rain\Support\Facade;
use Responsiv\Currency\Helpers\Currency as Helper;

class Currency extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'responsiv.currency.helper';
    }

    protected static function getFacadeInstance()
    {
        return new \Responsiv\Currency\Helpers\Currency;
    }

    public static function format($value, $params) {
        $curr = new Helper();
        return $curr->format($value, $params);
    }
}
