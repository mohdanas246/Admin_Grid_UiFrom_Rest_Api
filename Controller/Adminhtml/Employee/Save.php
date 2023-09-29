<?php
namespace Codilar\EmployeeDetails\Controller\Adminhtml\Employee;

use Codilar\EmployeeDetails\Api\EmployeeDetailsRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Codilar\EmployeeDetails\Api\Data\EmployeeDetailsInterface;

class Save extends Action
{
    protected $_resultPageFactory;
    /**
     * @var EmployeeDetailsRepositoryInterface
     */
    private $employeeRepository;

    /**
     * @var EmployeeDetailsInterface
     */
    private $employeeModel;

    protected $_storeManager;

    public function __construct(Context $context, PageFactory $resultPageFactory,EmployeeDetailsRepositoryInterface
                                        $employeeRepository, EmployeeDetailsInterface $employeeModel,
                                \Magento\Store\Model\StoreManagerInterface $storeManager) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->employeeRepository = $employeeRepository;
        $this->employeeModel = $employeeModel;
        $this->_storeManager = $storeManager;
        return parent::__construct($context);
    }

    public function execute()
    {
        $datas = $this->getRequest()->getParams();
        $imageUrl = $datas['photo'][0]['url'];
        try {
            if (isset($datas['id']))
            {
                $this->employeeModel->setId($datas['id']);
            }
            $this->employeeModel->setName($datas['name']);
            $this->employeeModel->setCompany($datas['company']);
            $this->employeeModel->setEmailId($datas['email_id']);
            $this->employeeModel->setImage($imageUrl);
            $this->employeeModel->setAddress($datas['address']);
            $this->employeeRepository->save($this->employeeModel);
            $this->messageManager->addSuccessMessage("Employee saved successfully");
        }catch (\Exception $e)
        {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('uiform/employee/employeegrid');
        return $redirect;
    }
}
