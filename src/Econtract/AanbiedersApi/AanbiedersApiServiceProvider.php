<?php namespace Econtract\AanbiedersApi;


use Illuminate\Support\ServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\ProductServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\SupplierServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\AffiliateServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\ComparisonServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\OptionServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\PromotionServiceProvider;

class AanbiedersApiServiceProvider extends ServiceProvider {

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
        $this->app['AanbiedersApi.product'] = $this->app->share(
            function($app)
            {
                return new ProductServiceProvider();
            }
        );
    }

    protected function registerSupplierServiceProvider()
    {
        $this->app['AanbiedersApi.supplier'] = $this->app->share(
            function($app)
            {
                return new SupplierServiceProvider();
            }
        );
    }

    protected function registerAffiliateServiceProvider()
    {
        $this->app['AanbiedersApi.affiliate'] = $this->app->share(
            function($app)
            {
                return new AffiliateServiceProvider();
            }
        );
    }

    protected function registerComparisonServiceProvider()
    {
        $this->app['AanbiedersApi.comparison'] = $this->app->share(
            function($app)
            {
                return new ComparisonServiceProvider();
            }
        );
    }

    protected function registerOptionServiceProvider()
    {
        $this->app['AanbiedersApi.option'] = $this->app->share(
            function($app)
            {
                return new OptionServiceProvider();
            }
        );
    }

    protected function registerPromotionServiceProvider()
    {
        $this->app['AanbiedersApi.promotion'] = $this->app->share(
            function($app)
            {
                return new PromotionServiceProvider();
            }
        );
    }

    protected function registerApiService()
    {
        $this->app['AanbiedersApi'] = $this->app->share(
            function($app)
            {
                return new ApiService(
                    $app['AanbiedersApi.product'],
                    $app['AanbiedersApi.supplier'],
                    $app['AanbiedersApi.affiliate'],
                    $app['AanbiedersApi.comparison'],
                    $app['AanbiedersApi.option'],
                    $app['AanbiedersApi.promotion']
                );
            }
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return array('AanbiedersApi');
    }

    public function boot()
    {
        // ...
    }

}
