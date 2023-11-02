<?php
namespace Codilar\EmployeeDetails\Controller\Adminhtml\Employee;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class EmployeeGrid extends Action
{
    protected PageFactory $_resultPageFactory;
    public function __construct(Context $context, PageFactory $resultPageFactory) {
        $this->_resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $resultPage =  $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Codilar_EmployeeDetails::details');
        $resultPage->setActiveMenu('Codilar_EmployeeDetails::invoiced');
        return $resultPage;
    }
}
