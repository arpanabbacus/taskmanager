<?php


namespace Magemonkeys\Taskmanager\Controller\Adminhtml\Tasks;

class Delete extends \Magemonkeys\Taskmanager\Controller\Adminhtml\Tasks
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('tasks_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Magemonkeys\Taskmanager\Model\Tasks::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Tasks.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['tasks_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Tasks to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
