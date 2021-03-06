<?php namespace Responsiv\Currency\Helpers;

use Session;
use Responsiv\Currency\Models\Currency as CurrencyModel;
use Responsiv\Currency\Classes\Converter as CurrencyConverter;

/**
 * Currency helper
 *
 * Use the facade to access this class:
 *
 *   1. use Responsiv\Currency\Facades\Currency as CurrencyHelper;
 *   2. CurrencyHelper::method();
 */
class Currency
{

    /**
     * Formats a number to currency.
     * @param int $number
     * @param array $options
     * @return string
     */
    public function format($number, $options = [])
    {
        $result = $number;

        extract(array_merge([
            'to' => null,
            'from' => null,
            'format' => null, // long|short
        ], $options));

        $toCurrency = strtoupper($to);
        $fromCurrency = strtoupper($from);
        $decimals = $format == 'short' ? 0 : 0;

        if (!$toCurrency) {
            $toCurrency = $this->currentCode();
        }

        $result = $this->convert($result, $toCurrency, $fromCurrency);
        if ($format == 'number') return $result;

        $currencyObj = CurrencyModel::findByCode($toCurrency);

        $result = $currencyObj
            ? $currencyObj->formatCurrency($result, $decimals)
            : number_format($result, $decimals);

        //$result = preg_replace('', '', $result);

        if ($format == 'long') {
            $result .= ' ' . ($toCurrency ?: $this->primaryCode());
        }

        return $result;
    }

    public function convert($value, $toCurrency = null, $fromCurrency = null)
    {
        if (!$fromCurrency) {
            $fromCurrency = $this->primaryCode();
        }
        if (!$toCurrency) {
            $toCurrency = $this->currentCode();
        }
        if ($fromCurrency == $toCurrency) return $value;

        return CurrencyConverter::instance()->convert($value, $fromCurrency, $toCurrency);
    }

    public function primaryCode()
    {
        return CurrencyModel::getPrimary()->currency_code;
    }
    public function currentCode()
    {
        if(!Session::has('responsiv.currency')) return $this->primaryCode();
        else return Session::get('responsiv.currency');
    }

    public function getSymbol($code) {
        $currency = CurrencyModel::findByCode($code);
        return $currency->currency_symbol;
    }
}