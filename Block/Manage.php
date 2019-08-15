<?php

namespace Graduation\QuickorderingSystem\Block;

class Manage extends \Magento\Framework\View\Element\Template
{
    protected $_quickordersFactory;

    /**
     * @var \Magento\Customer\Helper\Session\CurrentCustomer
     */
    protected $_currentCustomer;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Graduation\QuickorderingSystem\Model\QuickordersFactory $quickordersFactory,
        \Magento\Customer\Helper\Session\CurrentCustomer $currentCustomer,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->pageConfig->getTitle()->set(__('Manage Quickorders'));
        $this->_quickordersFactory = $quickordersFactory;
        $this->_currentCustomer = $currentCustomer;
        $this->setCollection($this->_quickordersFactory->create()->getCollection());
    }



    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getCollection()) {
            // create pager block for collection
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'quickorders.manage.pager'
            );
            $pager->setAvailableLimit(array(5 => 5));//set limit - how many records we want per page
            // setting quickorder collection to pager based on customer id
            $pager->setCollection($this->getCollection()->setOrder('quickorder_id', 'DESC')->addFieldToFilter('customer_id', array('eq'=>$this->_currentCustomer->getCustomer()->getId())));
            $this->setChild('pager', $pager);// set pager block in layout
        }
        return $this;
    }


    /**
     * @return string
     */
    // method for get pager html
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
