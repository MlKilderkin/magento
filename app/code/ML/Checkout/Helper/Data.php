<?php

namespace Customisation\CustomMenu\Helper;


class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_storeManager;
    protected $rootSettingsPath = 'custom_checkout_section/custom_checkout_general_settings/';
    protected $settingsPath = 'custom_checkout_section/custom_checkout_general_settings/custom_checkout_settings/';

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,  \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }
    public function getShowCustomFields()
    {
        return $this->scopeConfig->getValue($this->rootSettingsPath . 'use_custom_checkout', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }


    public function getAdditionalFieldsData($num = false, $data = false)
    {
        if(!$num) {
            return null;
        }
        $path = $this->settingsPath . 'additional_field_' . $num;
        if($data) {
            $path = $path . '_'. $data;
        }
        return $this->scopeConfig->getValue($path , \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }
}