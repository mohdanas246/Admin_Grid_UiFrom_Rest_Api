<?php

namespace Codilar\EmployeeDetails\Controller\Employee;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;


class Index extends \Magento\Customer\Controller\AbstractAccount implements HttpGetActionInterface
{
    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
//        $this->_view->loadLayout();
//        $this->_view->renderLayout()
//        $resultPage = $this->resultPageFactory->create();
//        $resultPage->getConfig()->getTitle()->set(__('Custom Tab'));
        return $this->resultPageFactory->create();
    }
}
