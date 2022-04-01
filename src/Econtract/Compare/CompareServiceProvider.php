<?php namespace Econtract\Compare;


use Illuminate\Support\ServiceProvider;
use Econtract\Compare\ServiceProviders\ProductServiceProvider;
use Econtract\Compare\ServiceProviders\SupplierServiceProvider;
use Econtract\Compare\ServiceProviders\AffiliateServiceProvider;
use Econtract\Compare\ServiceProviders\ComparisonServiceProvider;
use Econtract\Compare\ServiceProviders\OptionServiceProvider;
use Econtract\Compare\ServiceProviders\PromotionServiceProvider;

class CompareServiceProvider extends ServiceProvider {

    protected $defer = false;


    /**
     * @return void
     */
    public function register()
    {
        $this->registerProductServiceProvider();
        $this->registerSupplierServiceProvider();
        $this->registerComparisonServiceProvider();
        $this->registerOptionServiceProvider();
        $this->registerPromotionServiceProvider();
        $this->registerAffiliateServiceProvider();

        $this->registerApiService();
    }

    protected function registerProductServiceProvider()
    {
        $this->app->singleton(
            'Compare.product',
            function($app) {
                return new ProductServiceProvider();
            }
        );
    }

    protected function registerSupplierServiceProvider()
    {
         $this->app->singleton(
             'Compare.supplier',
             function($app) {
                 return new SupplierServiceProvider();
             }
        );
    }

    protected function registerAffiliateServiceProvider()
    {
         $this->app->singleton(
             'Compare.affiliate',
             function($app) {
                 return new AffiliateServiceProvider();
             }
        );
    }

    protected function registerComparisonServiceProvider()
    {
         $this->app->singleton(
             'Compare.comparison',
             function($app) {
                 return new ComparisonServiceProvider();
             }
        );
    }

    protected function registerOptionServiceProvider()
    {
         $this->app->singleton(
             'Compare.option',
             function($app) {
                 return new OptionServiceProvider();
             }
        );
    }

    protected function registerPromotionServiceProvider()
    {
         $this->app->singleton(
             'Compare.promotion',
             function($app) {
                 return new PromotionServiceProvider();
             }
        );
    }

    protected function registerApiService()
    {
         $this->app->singleton(
             'Compare',
             function($app) {
                 return new CompareService(
                     $app[ 'Compare.product' ],
                     $app[ 'Compare.supplier' ],
                     $app[ 'Compare.affiliate' ],
                     $app[ 'Compare.comparison' ],
                     $app[ 'Compare.option' ],
                     $app[ 'Compare.promotion' ]
                 );
             }
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('Compare');
    }

    public function boot()
    {
        // ...
    }

}
