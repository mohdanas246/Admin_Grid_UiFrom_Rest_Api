<?php
namespace Codilar\EmployeeDetails\Model;

class Product extends \Magento\Catalog\Model\Product
{
    public function getName()
    {
        return "don't worry overrided";
    }
}
