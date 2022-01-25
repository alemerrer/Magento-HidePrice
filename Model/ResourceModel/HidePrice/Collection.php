<?php
namespace Alex\HidePrice\Model\ResourceModel\HidePrice;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \Alex\HidePrice\Model\HidePrice::class,
            \Alex\HidePrice\Model\ResourceModel\HidePrice::class
        );
    }

    public function filterName($name): self
    {
        $this->addFieldToFilter('name', ['eq' => $name]);

        return $this;
    }
}
