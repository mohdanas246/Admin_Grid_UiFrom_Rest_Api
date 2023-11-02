<?php

namespace Codilar\EmployeeDetails\Controller\Adminhtml\Report;

abstract class Sales extends AbstractReport
{
    /**
     * Add report/sales breadcrumbs
     *
     * @return $this
     */
    public function _initAction()
    {
        parent::_initAction();
        $this->_addBreadcrumb(__('Sales'), __('Sales'));
        return $this;
    }

    /**
     * Determine if action is allowed for reports module
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        if ($this->getRequest()->getActionName() == 'invoiced') {
            return $this->_authorization->isAllowed('Codilar_EmployeeDetails::invoiced');
        }
    }
}
