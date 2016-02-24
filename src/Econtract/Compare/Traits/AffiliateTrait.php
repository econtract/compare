<?php namespace Econtract\Compare\Traits;


use Econtract\Compare\ServiceProviders\AffiliateServiceProvider;
use Econtract\Compare\Exceptions\CompareException;

trait AffiliateTrait {

    /**
     * @param array $params
     * @param array $affiliateIds
     * @return \stdClass
     * @throws CompareException
     */
    public function getAffiliates($params, $affiliateIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getAffiliateServiceProvider()->getAffiliates( $params, $affiliateIds )
        );
    }

    /**
     * @param array $params
     * @param int $affiliateId
     * @return \stdClass
     * @throws CompareException
     */
    public function getAffiliate($params, $affiliateId)
    {
        return $this->returnIfSuccessful(
            $this->getAffiliateServiceProvider()->getAffiliate( $params, $affiliateId )
        );
    }


    /**
     * @return AffiliateServiceProvider
     */
    protected function getAffiliateServiceProvider()
    {
        if( is_null($this->affiliateServiceProvider) ) {
            $this->affiliateServiceProvider = new AffiliateServiceProvider();
        }

        return $this->affiliateServiceProvider;
    }

}