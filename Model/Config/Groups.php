<?php
namespace Alex\HidePrice\Model\Config;

use Magento\Customer\Model\ResourceModel\Group\Collection as CustomerGroup;
use Magento\Framework\App\Helper\Context;

class Groups implements \Magento\Framework\Option\ArrayInterface
{
    public function __construct(
        Context $context,
        CustomerGroup $customerGroup
    )
    {
        $this->customerGroup = $customerGroup;
    }

    public function toOptionArray()
    {
        $customerGroups = $this->customerGroup->toOptionArray();
        return $customerGroups;
    }
}
