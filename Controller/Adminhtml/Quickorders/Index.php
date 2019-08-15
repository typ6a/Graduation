<?php

namespace Graduation\QuickorderingSystem\Controller\Adminhtml\Quickorders;

class Index extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Graduation_QuickorderingSystem::quickorders_manage');
        $resultPage->getConfig()->getTitle()->prepend((__('Quickorders')));
        return $resultPage;
    }
}
