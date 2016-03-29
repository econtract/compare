<?php namespace Econtract\Compare\Traits;


use Econtract\Compare\ServiceProviders\DualFuelServiceProvider;
use Econtract\Compare\Exceptions\CompareException;

trait DualFuelTrait {

    /**
     * @param integer $electricityId
     * @param integer $gasId
     * @return \stdClass
     */
    public function getDualFuelPackProductId($electricityId, $gasId)
    {
        return $this->returnIfSuccessful(
            $this->getDualFuelServiceProvider()->getDualFuelPackProductId( $electricityId, $gasId )
        );
    }


    /**
     * @return DualFuelServiceProvider
     */
    protected function getDualFuelServiceProvider()
    {
        if( is_null($this->dualFuelServiceProvider) ) {
            $this->dualFuelServiceProvider = new DualFuelServiceProvider();
        }

        return $this->dualFuelServiceProvider;
    }

}