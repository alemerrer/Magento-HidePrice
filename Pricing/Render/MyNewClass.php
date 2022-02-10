<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Alex\HidePrice\Pricing\Render;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Default price box renderer
 */
class MyNewClass
{
    public function __construct(ScopeConfigInterface $scopeConfigInterface) {
        $this->scopeConfigInterface =$scopeConfigInterface;
    }

    public function getParameters(): string
    {
        $config_val =  $this->scopeConfigInterface->getValue('Alex/general/alex_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $return = $config_val ? $config_val : '';

        return $return;
    }
}

