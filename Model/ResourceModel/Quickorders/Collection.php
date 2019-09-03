<?php
namespace Graduation\QuickorderingSystem\Model\ResourceModel\Quickorders;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'graduation_quickorderingsystem_quickorder_collection';
    protected $_eventObject = 'quickorder_collection';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Graduation\QuickorderingSystem\Model\Quickorders', 'Graduation\QuickorderingSystem\Model\ResourceModel\Quickorders');
    }
}

// To create Resource Model Collection we need to create Collection.php file in Model/ResourceModel/ResourceModelClassName Folder
// A collection resource model’s _init method accepts two arguments, the First one is ('Model\Quickorders')  -  model that this collection collects and the second argument ('Model\ResourceModel\Quickorders') -  collected model’s resource model.
