<?php
namespace Graduation\QuickorderingSystem\Model;

class Quickorders extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'graduation_quickorderingsystem_quickorder';

    protected $_cacheTag = 'graduation_quickorderingsystem_quickorder';

    protected $_eventPrefix = 'graduation_quickorderingsystem_quickorder';

    protected function _construct()
    {
        $this->_init('Graduation\QuickorderingSystem\Model\ResourceModel\Quickorders');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}


// We create model file (Model/Quickorders.php) inside Model Folder
// We can also define any other methods here in this class through which we can interact with our object.
// Whenever a object is instantiated the constructor is _construct() is  called which call the _init method with Models  resource model name. The resource model is created in the next sub step.

// $_eventPrefix - a prefix for events to be triggered
// $_eventObject - a object name when access in event
// $_cacheTag - a unique identifier for usage in caching

