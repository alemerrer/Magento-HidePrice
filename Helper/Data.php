<?php

namespace Alex\HidePrice\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Customer\Model\Session;



class Data extends AbstractHelper
{
    private Session $customerSession;
    private ScopeConfigInterface $scopeConfigInterface;

    public function __construct(ScopeConfigInterface $scopeConfigInterface, Session $customerSession) {
        $this->scopeConfigInterface = $scopeConfigInterface;
        $this->customerSession = $customerSession;

    }

    public function showOrNot($configValue) :bool
    {
        $status = $this->scopeConfigInterface->getValue('Alex/general/alex_status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $configGroup = explode(",", $this->scopeConfigInterface->getValue('Alex/general/alex_groups', \Magento\Store\Model\ScopeInterface::SCOPE_STORE));

        if ($status === '1') {
            if (!$this->customerSession->isLoggedIn()) {
                $customerGroup = '0';
            } else {
                $customerGroup = $this->customerSession->getCustomer()->getGroupId();
            }

            if (in_array((string) $customerGroup, $configGroup, true)) {
                return true;
            } else{
                return false;
            }
        }
        return true;
    }
}
