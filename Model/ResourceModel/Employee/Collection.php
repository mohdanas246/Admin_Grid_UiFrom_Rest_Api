<?php
namespace Codilar\EmployeeDetails\Model\ResourceModel\Employee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Codilar\EmployeeDetails\Model\Employee as Model;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee as ResourceModel;
class Collection  extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
