<?php namespace Econtract\Compare\Traits;


use Econtract\Compare\ServiceProviders\PromotionServiceProvider;
use Econtract\Compare\Exceptions\CompareException;

trait PromotionTrait {

    /**
     * @param array $params
     * @param array $promotionIds
     * @return \stdClass
     * @throws CompareException
     */
    public function getPromotions($params, $promotionIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getPromotionServiceProvider()->getPromotions( $params, $promotionIds )
        );
    }

    /**
     * @param array $params
     * @param int $promotionId
     * @return \stdClass
     * @throws CompareException
     */
    public function getPromotion($params, $promotionId)
    {
        return $this->returnIfSuccessful(
            $this->getPromotionServiceProvider()->getPromotion( $params, $promotionId )
        );
    }


    /**
     * @return PromotionServiceProvider
     */
    protected function getPromotionServiceProvider()
    {
        if( is_null($this->promotionServiceProvider) ) {
            $this->promotionServiceProvider = new PromotionServiceProvider();
        }

        return $this->promotionServiceProvider;
    }

}