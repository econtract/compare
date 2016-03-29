<?php namespace Econtract\Compare\ServiceProviders;


class DualFuelServiceProvider extends BaseServiceProvider {

    public function getDualFuelPackProductId($electricityId, $gasId)
    {
        $dualFuelPackProductId = $this->getApiClient()->getDualfuelpack( $electricityId, $gasId );
        if( $dualFuelPackProductId === 'false' ) {
            return 0;
        }

        return $dualFuelPackProductId;
    }

}