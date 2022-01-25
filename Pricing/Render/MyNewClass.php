<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Alex\HidePrice\Pricing\Render;

use Alex\HidePrice\Model\HidePriceFactory;
use Alex\HidePrice\Model\ResourceModel\HidePrice;


/**
 * Default price box renderer
 */
class MyNewClass
{

    public function __construct( HidePrice\CollectionFactory $hidePriceCollectionFactory) {

        $this->hidePriceCollectionFactory = $hidePriceCollectionFactory;

    }

    public function getParameters(): string
    {
        // $parametersCollection = $this->hidePriceCollectionFactory
        //     ->create()
        //     ->filterName('param2');
        $parametersCollection = $this->hidePriceCollectionFactory
        ->create();

        $parameters = '';
        foreach ($parametersCollection as $parameter) {
            $parameters .= $parameter->getName() . ' / '. $parameter->getContent();
        }
        return $parameters;
    }
}

