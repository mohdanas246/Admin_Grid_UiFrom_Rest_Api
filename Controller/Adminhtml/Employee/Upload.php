<?php
namespace Codilar\EmployeeDetails\Controller\Adminhtml\Employee;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Catalog\Model\ImageUploader;
use Magento\Framework\Controller\ResultFactory;


class Upload extends Action
{
    /**
     * Image uploader
     *
     * @var ImageUploader
     */
    protected ImageUploader $imageUploader;

    public function __construct(Context $context, ImageUploader $imageUploader) {
        $this->imageUploader = $imageUploader;
        parent::__construct($context);
    }
    public function execute()
    {
        $imageId = $this->getRequest()->getParam('param_name','image');

        try {
            $imageResult = $this->imageUploader->saveFileToTmpDir($imageId);
//            $imageResult['cookie'] = [
//                'name' => $this->_getSession()->getName(),
//                'value' => $this->_getSession()->getSessionId(),
//                'lifetime' => $this->_getSession()->getCookieLifetime(),
//                'path' => $this->_getSession()->getCookiePath(),
//                'domain' => $this->_getSession()->getCookieDomain(),
//            ];
        } catch (\Exception $e) {
            $imageResult = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($imageResult);
    }
}
