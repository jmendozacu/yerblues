<?php

namespace Custom\City\Controller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Result\PageFactory;
use Custom\City\Helper\Data;
use Custom\City\Model\CityFactory;

abstract class City extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Custom\City\Helper\Data
     */
    protected $_dataHelper;

    /**
     * @var \Custom\City\Model\CityFactory
     */
    protected $_cityFactory;

    /**
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param Data $dataHelper
     * @param CityFactory $cityFactory
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Data $dataHelper,
        CityFactory $cityFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->_pageFactory = $pageFactory;
        $this->_dataHelper = $dataHelper;
        $this->_cityFactory = $cityFactory;
        $this->scopeConfig = $scopeConfig;
        $this->resultJsonFactory = $resultJsonFactory;
    }
	/**
	* Get cities by state or country
	**/
	public function getCitiesByState($countryId,$stateId){
		$cities = array();
        $cities_indexes = array();
        if( $stateId!="" && $countryId!=""){
            $cities_options = $this->_cityFactory->create()->getCollection()
                ->addFieldToFilter('state_id',$stateId)
                ->addFieldToFilter('country_id',$countryId)
                ->addFieldToFilter('status',1);
            $cities_options->getSelect()
                ->order('city ASC');
            if($cities_options->count() > 0){
                foreach($cities_options as $city){
                    $cities[] = __($city->getCity());
                    $cities_indexes[] = $city->getCity();
                }
            }
        }elseif($stateId=="" && $countryId!=""){
            $cities_options = $this->_cityFactory->create()->getCollection()
                ->addFieldToFilter('country_id',$countryId)
                ->addFieldToFilter('status',1);
            $cities_options->getSelect()
                ->order('city ASC');
            if($cities_options->count() > 0){
                foreach($cities_options as $city){
                    $cities[] = __($city->getCity());
                    $cities_indexes[] = $city->getCity();
                }
            }
        }
		return array('cities'=>$cities,'cities_indexes'=>$cities_indexes);
	}
}