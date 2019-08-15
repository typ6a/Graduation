<?php

namespace Graduation\QuickorderingSystem\Controller\Adminhtml\Quickorders;

class Save extends \Magento\Backend\App\Action
{
    protected $_quickordersFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Graduation\QuickorderingSystem\Model\QuickordersFactory $quickordersFactory
    ) {
        $this->_quickordersFactory = $quickordersFactory;
        parent::__construct($context);
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('quickorderingsystem/quickorders/add');
            return;
        }
        try {
            $rowData =  $this->_quickordersFactory->create()->load($data['id']);
            if (!$rowData->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('quickorderingsystem/quickorders');
                return;
            }
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('quickorderingsystem/quickorders');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Graduation_QuickorderingSystem::save');
    }
}
