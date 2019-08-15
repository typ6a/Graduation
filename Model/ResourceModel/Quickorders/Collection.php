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
