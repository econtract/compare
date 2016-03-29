<?php namespace Econtract\Compare;


use Econtract\Compare\ServiceProviders\ProductServiceProvider;
use Econtract\Compare\ServiceProviders\SupplierServiceProvider;
use Econtract\Compare\ServiceProviders\AffiliateServiceProvider;
use Econtract\Compare\ServiceProviders\ComparisonServiceProvider;
use Econtract\Compare\ServiceProviders\PromotionServiceProvider;
use Econtract\Compare\ServiceProviders\OptionServiceProvider;
use Econtract\Compare\ServiceProviders\DualFuelServiceProvider;
use Econtract\Compare\Traits\SupplierTrait;
use Econtract\Compare\Traits\ProductTrait;
use Econtract\Compare\Traits\AffiliateTrait;
use Econtract\Compare\Traits\ComparisonTrait;
use Econtract\Compare\Traits\OptionTrait;
use Econtract\Compare\Traits\PromotionTrait;
use Econtract\Compare\Traits\DualFuelTrait;

use Econtract\Compare\Exceptions\CompareException;

class CompareService {

    use ProductTrait, SupplierTrait, AffiliateTrait, ComparisonTrait, OptionTrait, PromotionTrait, DualFuelTrait;


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

    /** @var DualFuelServiceProvider $dualFuelServiceProvider */
    protected $dualFuelServiceProvider = null;


    public function __construct($productServiceProvider = null, $supplierServiceProvider = null, $affiliateServiceProvider = null, $comparisonServiceProvider = null, $optionServiceProvider = null, $promotionServiceProvider = null, $dualFuelServiceProvider = null)
    {
        $this->productServiceProvider = $productServiceProvider;
        $this->supplierServiceProvider = $supplierServiceProvider;
        $this->affiliateServiceProvider = $affiliateServiceProvider;
        $this->comparisonServiceProvider = $comparisonServiceProvider;
        $this->promotionServiceProvider = $promotionServiceProvider;
        $this->optionServiceProvider = $optionServiceProvider;
        $this->dualFuelServiceProvider = $dualFuelServiceProvider;
    }


    /**
     * @param $response
     * @return \stdClass
     * @throws CompareException
     */
    protected function returnIfSuccessful($response)
    {
        if( is_array($response) || is_object($response) || $response === '' || is_null($response) ) {
            $response = 'Api error : something went wrong while recovering information via the API. Check your parameters for typos or other mistakes.';
        }

        if( strpos($response, 'Api error') !== false || strpos($response, 'is required') !== false ) {
            throw new CompareException($response);
        }

        return $response;
    }

}