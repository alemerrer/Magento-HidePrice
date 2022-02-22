<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Alex\HidePrice\Block\Index;


use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;


class Index extends Template
{
    private ScopeConfigInterface $scopeConfigInterface;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfigInterface,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->scopeConfigInterface = $scopeConfigInterface;
    }

    public function getContent() :string
    {
        $configText =  $this->scopeConfigInterface->getValue('Alex/general/alex_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);;
        return $configText;
    }

    public function getLink() :string
    {
        return $this->getUrl('customer/account/login');
    }


}

