<?php

namespace Codilar\EmployeeDetails\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee\CollectionFactory;

class Form extends Template
{
    public CollectionFactory $collection;

    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }
    public function getCollection()
    {
        return $this->collection->create();
    }
}
//
//use Magento\Framework\View\Element\Template;
//use Magento\Framework\View\Element\Template\Context;
//
//class  Form extends Template
//{
//    public function __construct(Context $context, array $data = [])
//    {
//        parent::__construct($context, $data);
//    }
//
//    public function getCustomTabInfo(){
//        return __("this is the content of the costom tab");
//    }
//}

