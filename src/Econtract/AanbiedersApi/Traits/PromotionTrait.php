<?php namespace Econtract\AanbiedersApi\Traits;


use Econtract\AanbiedersApi\Services\Api\PromotionServiceProvider;
use Econtract\AanbiedersApi\Exceptions\AanbiedersApiException;

trait PromotionTrait {

    /**
     * @param array $params
     * @param array $promotionIds
     * @return \stdClass
     * @throws AanbiedersApiException
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
     * @throws AanbiedersApiException
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