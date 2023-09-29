<?php
namespace Codilar\EmployeeDetails\Model;

use Codilar\EmployeeDetails\Api\Data\EmployeeDetailsExtensionInterface;
use Codilar\EmployeeDetails\Api\Data\EmployeeDetailsInterface;
use Magento\Framework\Model\AbstractModel;
use Codilar\EmployeeDetails\Model\ResourceModel\Employee as ResourceModel;

class Employee extends AbstractModel implements EmployeeDetailsInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->_getData(self::ID);
    }

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->setData(self::NAME,$name);
    }
    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->_getData(self::NAME);
    }
    /**
     * @param string $company
     * @return void
     */
    public function setCompany($company)
    {
        $this->setData(self::COMPANY,$company);
    }
    /**
     * @return string|null
     */
    public function getCompany()
    {
        return $this->_getData(self::COMPANY);
    }
    /**
     * @param string $email
     * @return void
     */
    public function setEmailId($email)
    {
        $this->setData(self::EMAIL_ID,$email);
    }
    /**
     * @return string|null
     */
    public function getEmailId()
    {
        return $this->_getData(self::EMAIL_ID);
    }
    /**
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->setData(self::ADDRESS,$address);
    }
    /**
     * @return  string|null
     */
    public function getAddress()
    {
        return $this->_getData(self::ADDRESS);
    }
    /**
     * @return string|null
     */
    public function getImage()
    {
        return $this->_getData(self::PHOTO);
    }
    /**
     * @param string $url
     * @return void
     */
    public function setImage($url)
    {
        $this->setData(self::PHOTO,$url);
    }

}
