<?php namespace Econtract\AanbiedersApi;


use Econtract\AanbiedersApi\ServiceProviders\ProductServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\SupplierServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\AffiliateServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\ComparisonServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\PromotionServiceProvider;
use Econtract\AanbiedersApi\ServiceProviders\OptionServiceProvider;
use Econtract\AanbiedersApi\Traits\SupplierTrait;
use Econtract\AanbiedersApi\Traits\ProductTrait;
use Econtract\AanbiedersApi\Traits\AffiliateTrait;
use Econtract\AanbiedersApi\Traits\ComparisonTrait;
use Econtract\AanbiedersApi\Traits\OptionTrait;
use Econtract\AanbiedersApi\Traits\PromotionTrait;

use Aanbieders\Api\Exceptions\AanbiedersApiException;

class ApiService {

    use ProductTrait, SupplierTrait, AffiliateTrait, ComparisonTrait, OptionTrait, PromotionTrait;


    /** @var ProductServiceProvider $productServiceProvider */
    protected $productServiceProvider = null;

    /** @var SupplierServiceProvider $supplierServiceProvider */
    protected $supplierServiceProvider = null;

    /** @var AffiliateServiceProvider $affiliateServiceProvider */
    protected $affiliateServiceProvider = null;

    /** @var ComparisonServiceProvider $comparisonServiceProvider */
    protected $comparisonServiceProvider = null;

    /** @var PromotionServiceProvider $promotionServiceProvider */
    protected $promotionServiceProvider = null;

    /** @var OptionServiceProvider $optionServiceProvider */
    protected $optionServiceProvider = null;


    public function __construct($productServiceProvider = null, $supplierServiceProvider = null, $affiliateServiceProvider = null, $comparisonServiceProvider = null, $optionServiceProvider = null, $promotionServiceProvider = null)
    {
        $this->productServiceProvider = $productServiceProvider;
        $this->supplierServiceProvider = $supplierServiceProvider;
        $this->affiliateServiceProvider = $affiliateServiceProvider;
        $this->comparisonServiceProvider = $comparisonServiceProvider;
        $this->promotionServiceProvider = $promotionServiceProvider;
        $this->optionServiceProvider = $optionServiceProvider;
    }


    /**
     * @param $response
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    protected function returnIfSuccessful($response)
    {
        if( is_array($response) || is_object($response) || $response === '' || is_null($response) ) {
            $response = 'Api error : something went wrong while recovering information via the API. Check your parameters for typos or other mistakes.';
        }

        if( strpos($response, 'Api error') !== false || strpos($response, 'is required') !== false ) {
            throw new AanbiedersApiException($response);
        }

        return $response;
    }

}