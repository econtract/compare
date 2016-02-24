<?php namespace Econtract\Compare\Traits;


use Econtract\Compare\ServiceProviders\SupplierServiceProvider;
use Econtract\Compare\Exceptions\CompareException;

trait SupplierTrait {

    /**
     * @param array $params
     * @param array $supplierIds
     * @return \stdClass
     * @throws CompareException
     */
    public function getSuppliers($params, $supplierIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getSupplierServiceProvider()->getSuppliers( $params, $supplierIds )
        );
    }

    /**
     * @param array $params
     * @param int $supplierId
     * @return \stdClass
     * @throws CompareException
     */
    public function getSupplier($params, $supplierId)
    {
        return $this->returnIfSuccessful(
            $this->getSupplierServiceProvider()->getSupplier( $params, $supplierId )
        );
    }


    /**
     * @return SupplierServiceProvider
     */
    protected function getSupplierServiceProvider()
    {
        if( is_null($this->supplierServiceProvider) ) {
            $this->supplierServiceProvider = new SupplierServiceProvider();
        }

        return $this->supplierServiceProvider;
    }

}