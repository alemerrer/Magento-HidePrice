<?php
namespace Alex\HidePrice\Plugin;

use Magento\Framework\View\LayoutFactory;
use Alex\HidePrice\Helper\Data;

class HidePriceRendering
{
    private LayoutFactory $layoutFactory;
    private Data $helper;

    public function __construct(LayoutFactory $layoutFactory, Data $helper) {
        $this->layoutFactory = $layoutFactory;
        $this->helper = $helper;
    }

    public function afterRenderAmount(\Magento\Catalog\Pricing\Render\FinalPriceBox $class, $result) :string
    {
        if ($this->helper->showOrNot('Alex/general/alex_status'))
        {
            return $result;
        }

        $layout = $this->layoutFactory->create();
        return $layout->createBlock('Alex\HidePrice\Block\Index\Index')->setTemplate('Alex_HidePrice::index/index.phtml')->toHtml();
    }
}
