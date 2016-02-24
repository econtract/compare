<?php namespace Econtract\AanbiedersApi\ServiceProviders;


class OptionServiceProvider extends BaseServiceProvider {

    public function getOptions($params, $optionIds = array())
    {
        $params['option_id'] = $optionIds;
        return $this->getApiClient()->getOptions( $params );
    }

    public function getOption($params, $optionId)
    {
        $params['option_id'] = array($optionId);
        $options = $this->getApiClient()->getOptions( $params );

        return substr($options, 1, -1);
    }

}