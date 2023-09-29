<?php
namespace Codilar\EmployeeDetails\Model;

use Braintree\Exception\NotFound;
use Codilar\EmployeeDetails\Api\Data\EmployeeDetailsInterface;
use Codilar\EmployeeDetails\Api\Data\EmployeeDetailsSearchResultInterfaceFactory;
use Codilar\EmployeeDetails\Api\EmployeeDetailsRepositoryInterface;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee\Collection;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee\CollectionFactory;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;

class EmployeeReporitory implements EmployeeDetailsRepositoryInterface
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var EmployeeDetailsSearchResultInterfaceFactory
     */
    private $searchResultFactory;

    /**
     * @var EmployeeFactory
     */
    private $employeeFactory;

    /**
     * @var Employee
     */
    private $employeeResource;



    function __construct( CollectionFactory $collectionFactory ,
                          EmployeeDetailsSearchResultInterfaceFactory $searchResultFactory,
                          EmployeeFactory $employeeFactory , Employee $employeeResource)
    {
        $this->collectionFactory = $collectionFactory;
        $this->searchResultFactory = $searchResultFactory;
        $this->employeeFactory = $employeeFactory;
        $this->employeeResource = $employeeResource;
    }
    /**
     * @param $id
     * @return EmployeeDetailsInterface
     * @throws NotFound
     */
    public function getById($id)
    {
//         $collection = $this->collectionFactory->create();
//         try {
//            $employee =  $collection->getItemById($id);
//            dd($employee);
//         }catch (\Exception $e)
//         {
//             throw new NotFound("There is no record in this id");
//         }
        $employee = $this->employeeFactory->create();
        $this->employeeResource->load($employee,$id);
        return $employee;
    }

    /**
     * @param EmployeeDetailsInterface $employee
     * @return EmployeeDetailsInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save(EmployeeDetailsInterface $employee)
    {
        $collection = $this->collectionFactory->create();
        $collection->getResource()->save($employee);
        return $employee;
    }

    /**
     * @param EmployeeDetailsInterface $employee
     * @return bool
     * @throws NotFound
     */
    public function delete(EmployeeDetailsInterface $employee)
    {
        return $this->deleteById($employee->getId());
    }

    /**
     * @param $employeeId
     * @return bool
     * @throws NotFound
     */
    public function deleteById($employeeId)
    {
        $collection = $this->collectionFactory->create();
        try {
            $employee = $collection->getItemById($employeeId);
            $collection->getResource()->delete($employee);
        }catch (\Exception $e)
        {
            throw new NotFound("Data not found");
        }
        return true;
    }

//     /**
//      * @param string $name
//      * @param string $address
//      * @param string $company
//      * @param string $email
//      * @param string $imageurl
//      * @return EmployeeDetailsInterface
//      */
//     public function restSave(string $name, string $address, string $company, string $email, string $imageurl): EmployeeDetailsInterface|null
//     {
//         return null;
//     }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Codilar\EmployeeDetails\Api\Data\EmployeeDetailsSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();
        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);
        $collection->load();
        return $this->buildSearchResult($searchCriteria, $collection);

    }
    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array) $searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }
    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
