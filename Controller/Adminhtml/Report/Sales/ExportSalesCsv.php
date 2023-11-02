<?php

namespace Codilar\EmployeeDetails\Controller\Adminhtml\Report\Sales;

use Codilar\EmployeeDetails\Controller\Adminhtml\Report\Sales;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class ExportSalesCsv extends Sales
{
    public function execute()
    {
        $fileName = 'sales.csv';
        $grid = $this->_view->getLayout()->createBlock(\Magento\Reports\Block\Adminhtml\Sales\Sales\Grid::class);
        $this->_initReportAction($grid);
        return $this->_fileFactory->create($fileName, $grid->getCsvFile(), DirectoryList::VAR_DIR);
    }
}
