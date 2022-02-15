<?php
namespace Alex\HidePrice\Plugin;


use Magento\Framework\Pricing\Amount\AmountInterface;
use Magento\Catalog\Pricing\Render\FinalPriceBox;
use Magento\Framework\App\Config\ScopeConfigInterface;

class PluginTest
{
    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfigInterface) {
        $this->scopeConfigInterface =$scopeConfigInterface;
    }

    public function afterRenderAmount(\Magento\Catalog\Pricing\Render\FinalPriceBox $toto, $result)
    {
        $status = $config_val =  $this->scopeConfigInterface->getValue('Alex/general/alex_status', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        $return = $result;

        if ($status == 1) {
            $config_val =  $this->scopeConfigInterface->getValue('Alex/general/alex_text', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
            $return = $config_val ? $config_val : '';  
        }
        
        return $return;
    }
}