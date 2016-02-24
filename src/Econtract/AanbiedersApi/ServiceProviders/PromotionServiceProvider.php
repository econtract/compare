<?php namespace Econtract\AanbiedersApi\ServiceProviders;


class PromotionServiceProvider extends BaseServiceProvider {

    public function getPromotions($params, $promotionIds = array())
    {
        $params['promotion_id'] = $promotionIds;
        return $this->getApiClient()->getPromotions( $params );
    }

    public function getPromotion($params, $promotionId)
    {
        $params['promotion_id'] = array($promotionId);
        $promotions = $this->getApiClient()->getPromotions( $params );

        return substr($promotions, 1, -1);
    }

}