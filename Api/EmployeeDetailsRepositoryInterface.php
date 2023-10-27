<?php
namespace Codilar\EmployeeDetails\Api;

use Codilar\EmployeeDetails\Api\Data\EmployeeDetailsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface EmployeeDetailsRepositoryInterface
{
    /**
     * @param int $id
     * @return EmployeeDetailsInterface
     */
    public function getById($id);

    /**
     * @param EmployeeDetailsInterface $employee
     * @return EmployeeDetailsInterface
     */
    public function save(EmployeeDetailsInterface $employee);

//    /**
//     * @param string $name
//     * @param string $address
//     * @param string $company
//     * @param string $email
//     * @param string $imageurl
//     * @return EmployeeDetailsInterface
//     */
//    public function restSave(string $name, string $address, string $company, string $email, string $imageurl);

    /**
     * @param EmployeeDetailsInterface $employee
     * @return boolean
     */
    public function delete(EmployeeDetailsInterface $employee);

    /**
     * @param int $employeeId
     * @return boolean
     */
    public function deleteById($employeeId);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codilar\EmployeeDetails\Api\Data\EmployeeDetailsSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
