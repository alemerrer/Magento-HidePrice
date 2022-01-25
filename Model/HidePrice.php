<?php
namespace Alex\HidePrice\Model;

use Magento\Framework\Model\AbstractModel;

class HidePrice extends AbstractModel
{
    protected function _construct(): void
    {
        $this->_init(ResourceModel\HidePrice::class);
    }

    public function getName(): string
    {
        return $this->getData('name');
    }
}
