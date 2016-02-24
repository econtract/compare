<?php namespace Econtract\Compare\ServiceProviders;


class ProductServiceProvider extends BaseServiceProvider {

    public function getProducts($params, $productIds = array())
    {
        $products = $this->getApiClient()->getProducts( $params, $productIds );

        return $products;
    }

    public function getProduct($params, $productId)
    {
        $products = $this->getApiClient()->getProducts( $params, $productId );

        return substr($products, 1, -1);
    }

}