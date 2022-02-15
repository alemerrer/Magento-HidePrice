<?php

namespace Alex\HidePrice\Model\Config\Backend;

class Custom extends \Magento\Framework\App\Config\Value
{

    const CUSTOM_OPTION_STRING_PATH = 'Alex\HidePrice\backend/another_option';
    protected $_configValueFactory;
    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $config
     * @param \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList
     * @param \Magento\Framework\App\Config\ValueFactory $configValueFactory
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param string $runModelPath
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Config\ScopeConfigInterface $config,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\App\Config\ValueFactory $configValueFactory,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->_configValueFactory = $configValueFactory;

        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    // public function beforeSave()
    // {
    //     $label = $this->getData('field_config/label');

    //     if ($this->getValue() == '') {
    //         throw new \Magento\Framework\Exception\ValidatorException(__($label . ' is required.'));
    //     } else if (!is_numeric($this->getValue())) {
    //         throw new \Magento\Framework\Exception\ValidatorException(__($label . ' is not a number.'));
    //     } else if ($this->getValue() < 0) {
    //         throw new \Magento\Framework\Exception\ValidatorException(__($label . ' is less than 0.'));
    //     }

    //     $this->setValue(intval($this->getValue()));

    //     parent::beforeSave();
    // }

    public function afterSave()
    {
        $value = $this->getValue();

        try {
            $this->_configValueFactory->create()->load(
                self::CUSTOM_OPTION_STRING_PATH,
                'path'
            )->setValue(
                $value
            )->setPath(
                self::CUSTOM_OPTION_STRING_PATH
            )->save();
        } catch (\Exception $e) {
            throw new \Exception(__('We can\'t save new option.'));
        }

        return parent::afterSave();
    }
}