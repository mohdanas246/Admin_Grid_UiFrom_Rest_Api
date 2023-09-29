<?php
namespace Codilar\EmployeeDetails\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Employee extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('employee_info', 'id');
    }
}
