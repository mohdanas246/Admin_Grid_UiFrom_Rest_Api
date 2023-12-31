<?php
namespace Codilar\EmployeeDetails\Ui\DataProvider;

use Codilar\EmployeeDetails\Model\ResourceModel\Employee\CollectionFactory;

class FormDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @var ResourceModel\Employee\Collection
     */
    protected $collection;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct($name, $primaryFieldName, $requestFieldName,
                                CollectionFactory $collectionFactory, array $meta = [],
                                array $data = [])
    {
        $this->collection = $collectionFactory->create();
        $this->meta = $this->prepareMeta($this->meta);
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @param array $meta
     * @return array
     */
    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $item)
        {
            $employeeData = $item->getData();
            $employeeImg = $employeeData['photo'];
            unset($employeeData['photo']);
            $employeeData['photo'][0]['name'] = $employeeImg;
            $employeeData['photo'][0]['url'] = $employeeImg;
            $this->loadedData[$item->getId()] = $employeeData;
        }
        return $this->loadedData;
    }
}
