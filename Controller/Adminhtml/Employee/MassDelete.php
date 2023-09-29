<?php
namespace Codilar\EmployeeDetails\Controller\Adminhtml\Employee;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee\CollectionFactory;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee as EmployeeResource;
use Magento\Framework\View\Result\PageFactory;

class MassDelete extends Action
{
    protected PageFactory $_resultPageFactory;
    /**
     * @var Filter
     */
    protected Filter $filter;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @var EmployeeResource
     */
    private $employeeResource;


    public function __construct(Context $context, PageFactory $resultPageFactory, Filter $filter,
                                CollectionFactory $collectionFactory, EmployeeResource $employeeResource) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->employeeResource = $employeeResource;
        return parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $size = $collection->getSize();
        foreach ($collection as $data)
        {
            //dd(get_class_methods($data));
            $data->delete();
        }
        $this->messageManager->addSuccessMessage($size . "Employess deleted successfully");
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('uiform/employee/employeegrid');
        return $redirect ;
    }
}
