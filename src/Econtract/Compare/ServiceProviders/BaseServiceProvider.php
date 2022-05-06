<?php namespace Econtract\Compare\ServiceProviders;


use Ixudra\Curl\CurlService;
use Aanbieders;

class BaseServiceProvider {

    protected $apiClient = null;

    protected $curlService = null;

    protected $defaults = array();

    protected $guards = array();


    protected function getApiClient()
    {
        $this->apiClient = new Aanbieders(
            array(
                'key'           => config('econtract.key'),
                'secret'        => config('econtract.secret'),
                'host'          => config('econtract.host'),
                'staging'       => config('econtract.staging'),
            )
        );

        return $this->apiClient;
    }

    protected function getCurlService()
    {
        if( is_null($this->curlService) ) {
            $this->curlService = new CurlService();
        }

        return $this->curlService;
    }

    protected function addDefaultAttributes($attributes)
    {
        return array_merge( $this->defaults, $attributes );
    }

    protected function filterImmutableAttributes($attributes)
    {
        foreach( $this->guards as $guard ) {
            if( array_key_exists( $guard, $attributes ) ) {
                unset( $attributes[ $guard ] );
            }
        }

        return $attributes;
    }

}
