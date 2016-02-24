<?php namespace Econtract\Compare\ServiceProviders;


class ComparisonServiceProvider extends BaseServiceProvider {

    public function getComparisons($params)
    {
        $comparisons = $this->getApiClient()->compare( $params );

        return $comparisons;
    }

    public function readComparison($params, $comparisonId)
    {
        $comparison = $this->getApiClient()->readComparison( $params, $comparisonId );

        return $comparison;
    }

}