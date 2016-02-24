<?php namespace Econtract\Compare\Traits;


use Econtract\Compare\ServiceProviders\OptionServiceProvider;
use Econtract\Compare\Exceptions\CompareException;

trait OptionTrait {

    /**
     * @param array $params
     * @param array $optionIds
     * @return \stdClass
     * @throws CompareException
     */
    public function getOptions($params, $optionIds = array())
    {
        return $this->returnIfSuccessful(
            $this->getOptionServiceProvider()->getOptions( $params, $optionIds )
        );
    }

    /**
     * @param array $params
     * @param int $optionId
     * @return \stdClass
     * @throws CompareException
     */
    public function getOption($params, $optionId)
    {
        return $this->returnIfSuccessful(
            $this->getOptionServiceProvider()->getOption( $params, $optionId )
        );
    }


    /**
     * @return OptionServiceProvider
     */
    protected function getOptionServiceProvider()
    {
        if( is_null($this->optionServiceProvider) ) {
            $this->optionServiceProvider = new OptionServiceProvider();
        }

        return $this->optionServiceProvider;
    }

}