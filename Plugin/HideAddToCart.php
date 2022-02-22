<?php

namespace Alex\HidePrice\Plugin;

use Alex\HidePrice\Helper\Data;
use Magento\Catalog\Model\Product;

class HideAddToCart
{
    private Data $helper;

    public function __construct(Data $helper) {
        $this->helper = $helper;
    }
    public function afterIsSaleable(Product $product, $result) :bool
    {
        if ($this->helper->showOrNot('Alex/general/alex_status'))
        {
            return $result;
        }
        return false;
    }
}
