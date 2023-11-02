<?php
namespace Codilar\EmployeeDetails\Controller\Adminhtml;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Response\Http\FileFactory;


abstract class Index extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_Reports::report';

    /**
     * @var FileFactory
     */
    protected FileFactory $_fileFactory;

    /**
     * @param Context $context
     * @param FileFactory $fileFactory
     */
    public function __construct(
        Context $context,
        FileFactory $fileFactory
    ) {
        $this->_fileFactory = $fileFactory;
        parent::__construct($context);
    }
}
