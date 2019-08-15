<?php
namespace Graduation\QuickorderingSystem\Model\ResourceModel;

class Quickorders extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('graduation_quickordering_system', 'id');
        //$this->_init('table name', 'primary key column name');
    }
}
