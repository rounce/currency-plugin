<?php namespace Responsiv\Currency;

use Backend;
use System\Classes\PluginBase;
use Illuminate\Foundation\AliasLoader;

/**
 * Currency Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = ['RainLab.Translate'];
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Currency',
            'description' => 'Tools for currency display and conversion',
            'author'      => 'Responsiv Internet',
            'icon'        => 'icon-usd',
            'homepage'    => 'https://github.com/responsiv/currency-plugin'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register()
    {
        $alias = AliasLoader::getInstance();
        $alias->alias('Currency', 'Responsiv\Currency\Facades\Currency');
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Responsiv\Currency\Components\Currencies' => 'currencies'
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'responsiv.currency.some_permission' => [
                'tab'   => 'Currency',
                'label' => 'Some permission'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'currencies' => [
                'label'       => 'Currencies',
                'description' => 'Create and configure available currencies.',
                'icon'        => 'icon-usd',
                'url'         => Backend::url('responsiv/currency/currencies'),
                'category'    => 'Currency',
                'order'       => 500
            ],
            'converters' => [
                'label'       => 'Currency converters',
                'description' => 'Select and manage the currency converter to use.',
                'icon'        => 'icon-calculator',
                'url'         => Backend::url('responsiv/currency/converters'),
                'category'    => 'Currency',
                'order'       => 510
            ]
        ];
    }

    /**
     * Register new Twig variables
     * @return array
     */
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'currency' => ['Responsiv\Currency\Facades\Currency', 'format']
            ]
        ];
    }

    /**
     * Registers any currency converters implemented in this plugin.
     * The converters must be returned in the following format:
     * ['className1' => 'alias'],
     * ['className2' => 'anotherAlias']
     */
    public function registerCurrencyConverters()
    {
        return [
            'Responsiv\Currency\ExchangeTypes\EuropeanCentralBank' => 'ecb',
            'Responsiv\Currency\ExchangeTypes\CoinMarketCap'       => 'coinmarketcap',
            'Responsiv\Currency\ExchangeTypes\Fixer'               => 'fixer'
        ];
    }

}
