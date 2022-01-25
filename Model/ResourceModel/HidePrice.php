<?php
namespace Alex\HidePrice\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class HidePrice extends AbstractDb
{
    private const HIDEPRICE_TABLE_NAME = 'HidePrice';

    protected function _construct()
    {
        $this->_init(self::HIDEPRICE_TABLE_NAME, 'parameter_id');
    }
}
