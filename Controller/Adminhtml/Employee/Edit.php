<?php
namespace Codilar\EmployeeDetails\Controller\Adminhtml\Employee;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codilar\EmployeeDetails\Api\EmployeeDetailsRepositoryInterface;

class Edit extends Action
{
    protected $_resultPageFactory;
    /**
     * @var EmployeeDetailsRepositoryInterface
     */
    private $employeeResource;

    public function __construct(Context $context, PageFactory $resultPageFactory,EmployeeDetailsRepositoryInterface
                                        $employeeResource) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->employeeResource = $employeeResource;

        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $employee = $this->employeeResource->getById($id);
        $resultpage = $this->_resultPageFactory->create();
        $resultpage->getConfig()->getTitle()->prepend($employee->getName());
        return $resultpage;
    }
}
