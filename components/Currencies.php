<?php namespace Responsiv\Currency\Components;

use Lang;
use Session;
use Exception;
use Redirect;
use Cms\Classes\ComponentBase;
use Responsiv\Currency\Models\Currency;

class Currencies extends ComponentBase
{
    protected $active;
    /**
     * @var RainLab\Translate\Classes\Translator Translator object.
     */
    protected $translator;

    /**
     * @var array Collection of enabled locales.
     */
    public $locales;

    /**
     * @var string The active locale code.
     */
    public $activeLocale;

    /**
     * @var string The active locale name.
     */
    public $activeLocaleName;

    public function componentDetails() {
        return [
            'name'        => 'responsiv.currency::lang.currency_picker.name',
            'description' => 'responsiv.currency::lang.currency_picker.description',
        ];
    }

    public function onRun() {
        $this->page['currencies'] = Currency::listEnabled();

        if(!Session::has('responsiv.currency')) $this->page['activeCurrencySymb'] = Currency::getPrimary()->currency_symbol;
        else $this->page['activeCurrencySymb'] = Session::get('responsiv.symb');

        if(!Session::has('responsiv.currency')) $this->page['activeCurrency'] = Currency::getPrimary();
        else $this->page['activeCurrency'] = Session::get('responsiv.currency');
    }

    public function onSwitchCurrency() {
        if(!$currency = post('currency')) return;

        if(!Currency::isValid($currency)) return;

        $symb = Currency::findByCode($currency)->currency_symbol;

        Session::put('responsiv.currency', $currency);
        Session::put('responsiv.symb', $symb);

        return Redirect::to(Redirect::getUrlGenerator()->full());
    }
}