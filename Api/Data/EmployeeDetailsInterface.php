<?php

namespace Codilar\EmployeeDetails\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface EmployeeDetailsInterface
{
    const ID = 'id';
    const NAME = 'name';
    const COMPANY = 'company';
    const EMAIL_ID = 'email_id';
    const ADDRESS = 'address';
    const PHOTO = 'photo';
    /**
     * @return int|null
     */
    public function getId();

    /**
     * @param int $id
     * @return void
     */
    public function setId($id);
    /**
     * @param string $name
     * @return void
     */
    public function setName($name);
    /**
     * @return string|null
     */
    public function getName();
    /**
     * @param string $company
     * @return void
     */
    public function setCompany($company);
    /**
     * @return string|null
     */
    public function getCompany();
    /**
     * @param string $email
     * @return void
     */
    public function setEmailId($email);

    /**
     * @return string|null
     */
    public function getEmailId();
    /**
     * @param string $address
     * @return void
     */
    public function setAddress($address);
    /**
     * @return  string|null
     */
    public function getAddress();

    /**
     * @return  string|null
     */
    public function getImage();

    /**
     * @param string $url
     * @return void
     */
    public function setImage($url);
}
