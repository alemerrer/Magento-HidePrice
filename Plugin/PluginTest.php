<?php
namespace Alex\HidePrice\Plugin;

use Magento\Framework\Pricing\Amount\AmountInterface;
use Magento\Catalog\Pricing\Render\FinalPriceBox;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Customer\Model\Session;

class PluginTest
{
    public function __construct(ScopeConfigInterface $scopeConfigInterface, Session $customerSession) {
        $this->scopeConfigInterface =$scopeConfigInterface;
        $this->customerSession =$customerSession;
    }

    public function afterRenderAmount(\Magento\Catalog\Pricing\Render\FinalPriceBox $class, $result)
    {
        $status = $this->scopeConfigInterface->getValue('Alex/general/alex_status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if ($status === 0) {
            return $result;
        }

        $customerGroup = $this->customerSession->getCustomer()->getGroupId();
        $configGroup = explode(",", $this->scopeConfigInterface->getValue('Alex/general/alex_groups', \Magento\Store\Model\ScopeInterface::SCOPE_STORE));;
        $configText =  $this->scopeConfigInterface->getValue('Alex/general/alex_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        if (in_array($customerGroup, $configGroup, true)) {
            return $configText;
        } else {
            return $result;
        }
    }
}
