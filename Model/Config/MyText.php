<?php
namespace Alex\HidePrice\Model\Config;
 
class MyText implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return array('hello');
    }
}