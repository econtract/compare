<?php namespace Econtract\Compare\Traits;


use Econtract\Compare\ServiceProviders\ComparisonServiceProvider;
use Econtract\Compare\Exceptions\CompareException;

trait ComparisonTrait {

    /**
     * @param array $params
     * @return \stdClass
     * @throws CompareException
     */
    public function createComparison($params)
    {
        return $this->returnIfSuccessful(
            $this->getApiComparisonServiceProvider()->createComparison($params)
        );
    }

    /**
     * @param int $comparisonId
     * @param array $params
     * @return \stdClass
     * @throws CompareException
     */
    public function getComparisonParameters($comparisonId, $params = array())
    {
        return $this->returnIfSuccessful(
            $this->getApiComparisonServiceProvider()->getComparisonParameters($comparisonId, $params)
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