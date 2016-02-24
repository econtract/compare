<?php namespace Econtract\AanbiedersApi\Traits;


use Econtract\AanbiedersApi\ServiceProviders\ComparisonServiceProvider;
use Econtract\AanbiedersApi\Exceptions\AanbiedersApiException;

trait ComparisonTrait {

    /**
     * @param array $params
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function getComparisons($params)
    {
        return $this->returnIfSuccessful(
            $this->getApiComparisonServiceProvider()->getComparisons($params)
        );
    }

    /**
     * @param array $params
     * @param int $comparisonId
     * @return \stdClass
     * @throws AanbiedersApiException
     */
    public function readComparison($params, $comparisonId)
    {
        return $this->returnIfSuccessful(
            $this->getApiComparisonServiceProvider()->readComparison($params, $comparisonId)
        );
    }


    /**
     * @return ComparisonServiceProvider
     */
    protected function getApiComparisonServiceProvider()
    {
        if( is_null($this->comparisonServiceProvider) ) {
            $this->comparisonServiceProvider = new ComparisonServiceProvider();
        }

        return $this->comparisonServiceProvider;
    }

}