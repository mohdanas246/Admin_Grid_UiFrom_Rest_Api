<?php

namespace Codilar\EmployeeDetails\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface EmployeeDetailsSearchResultInterface extends SearchResultsInterface
{
    /**
     * Get items list.
     *
     * @return \Codilar\EmployeeDetails\Api\Data\EmployeeDetailsInterface[]
     */
    public function getItems();

    /**
     * Set items list.
     *
     * @param \Codilar\EmployeeDetails\Api\Data\EmployeeDetailsInterface[] $items
     * @return void
     */
    public function setItems(array $items);

}
