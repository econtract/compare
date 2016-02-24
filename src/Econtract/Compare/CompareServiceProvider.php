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
        $this->app['Compare.product'] = $this->app->share(
            function($app)
            {
                return new ProductServiceProvider();
            }
        );
    }

    protected function registerSupplierServiceProvider()
    {
        $this->app['Compare.supplier'] = $this->app->share(
            function($app)
            {
                return new SupplierServiceProvider();
            }
        );
    }

    protected function registerAffiliateServiceProvider()
    {
        $this->app['Compare.affiliate'] = $this->app->share(
            function($app)
            {
                return new AffiliateServiceProvider();
            }
        );
    }

    protected function registerComparisonServiceProvider()
    {
        $this->app['Compare.comparison'] = $this->app->share(
            function($app)
            {
                return new ComparisonServiceProvider();
            }
        );
    }

    protected function registerOptionServiceProvider()
    {
        $this->app['Compare.option'] = $this->app->share(
            function($app)
            {
                return new OptionServiceProvider();
            }
        );
    }

    protected function registerPromotionServiceProvider()
    {
        $this->app['Compare.promotion'] = $this->app->share(
            function($app)
            {
                return new PromotionServiceProvider();
            }
        );
    }

    protected function registerApiService()
    {
        $this->app['Compare'] = $this->app->share(
            function($app)
            {
                return new CompareService(
                    $app['Compare.product'],
                    $app['Compare.supplier'],
                    $app['Compare.affiliate'],
                    $app['Compare.comparison'],
                    $app['Compare.option'],
                    $app['Compare.promotion']
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
