<?php
namespace Codilar\EmployeeDetails\Controller\Adminhtml\Employee;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Codilar\EmployeeDetails\Model\EmployeeFactory;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee as DataResourceModel;

class EditEmployeeInline extends Action
{
    protected $jsonFactory;
    private $employeeFactory;
    private $dataResourceModel;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        EmployeeFactory $employeeFactory,
        DataResourceModel $dataResourceModel)
    {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
        $this->employeeFactory = $employeeFactory;
        $this->dataResourceModel = $dataResourceModel;
    }

    public function execute()
    {
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];

        if ($this->getRequest()->getParam('isAjax'))
        {
            $postItems = $this->getRequest()->getParam('items');
            if (!count($postItems))
            {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            }
            else
            {
                foreach (array_keys($postItems) as $modelid)
                {
                    $model = $this->employeeFactory->create();
                    $this->dataResourceModel->load($model, $modelid);
                    try
                    {
                        $model->setData(array_merge($model->getData(), $postItems[$modelid]));
                        $this->dataResourceModel->save($model);
                    }
                    catch (\Exception $e)
                    {
                        $messages[] = "[Error : {$modelid}]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }
        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error]);
    }
}
