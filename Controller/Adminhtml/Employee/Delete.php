<?php
namespace Codilar\EmployeeDetails\Controller\Adminhtml\Employee;

use Codilar\EmployeeDetails\Api\EmployeeDetailsRepositoryInterface;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Delete extends Action
{
    protected $_resultPageFactory;
    /**
     * @var EmployeeDetailsRepositoryInterface
     */
    private $employeeRepository;

    public function __construct(Context $context, PageFactory $resultPageFactory,
                                EmployeeDetailsRepositoryInterface $employeeRepository) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->employeeRepository = $employeeRepository;
        return parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        try {
            $this->employeeRepository->deleteById($id);
        }catch (\Exception $e)
        {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('uiform/employee/employeegrid');
        return $redirect;
    }
}
