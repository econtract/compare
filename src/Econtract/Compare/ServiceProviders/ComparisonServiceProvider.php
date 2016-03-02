<?php namespace Econtract\Compare\ServiceProviders;


class ComparisonServiceProvider extends BaseServiceProvider {

    public function createComparison($params)
    {
        $comparisons = $this->getApiClient()->compare( $params );

        return $comparisons;
    }

    public function getComparisonParameters($comparisonId, $params = array())
    {
        $comparison = $this->getApiClient()->readComparison( $params, $comparisonId );

        return $comparison;
    }

}