<?php namespace Econtract\Compare\Traits;


use Econtract\Compare\ServiceProviders\ComparisonServiceProvider;
use Econtract\Compare\Exceptions\CompareException;

trait ComparisonTrait {

    /**
     * @param array $params
     * @return \stdClass
     * @throws CompareException
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
     * @throws CompareException
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