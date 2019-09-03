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

// (action="ticketingsystem/tickets/index"). Magento 2 Controller contains one or more files in Controller folder of module, it includes class of action type which contain execute() method. If we put in another way every URL in Magento 2 corresponds to a single controller file, and each controller file has a single execute method.

// The controller is rendering the page in execute method, this is how it happens. 

// We injected a “page factory” object via automatic constructor dependency injection in the __construct method.

// \Magento\Backend\App\Action\Context $context,

// \Magento\Framework\View\Result\PageFactory $resultPageFactory

// We Use that page factory object to create a page and Return the created page.

// $resultPage = $this->resultPageFactory->create();

// return $resultPage;

// Since our module is running in the backend due to the automatic DI our resultPage returns result of type MagentoBackendModelViewResultPage