<?php
namespace Alex\HidePrice\Setup\Patch\Data;

use Alex\HidePrice\Model\HidePriceFactory;
use Alex\HidePrice\Model\ResourceModel\HidePrice;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class CreateParameters implements DataPatchInterface
{
    private HidePrice $hidePriceResourceModel;
    private HidePriceFactory $hidePriceFactory;

    public function __construct(
        HidePrice $hidePriceResourceModel,
        HidePriceFactory $hidePriceFactory
    ) {
        $this->hidePriceResourceModel = $hidePriceResourceModel;
        $this->hidePriceFactory = $hidePriceFactory;
    }

    public function apply()
    {
        $first = $this->hidePriceFactory->create();

        $first->setData('name', 'param1');
        $first->setData('content', 'first');

        $this->hidePriceResourceModel->save($first);

        $second = $this->hidePriceFactory->create();

        $second->setData('name', 'param2');
        $second->setData('content', 'second');

        $this->hidePriceResourceModel->save($second);

        $third = $this->hidePriceFactory->create();

        $third->setData('name', 'param3');
        $third->setData('content', 'third');

        $this->hidePriceResourceModel->save($third);
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }
}
