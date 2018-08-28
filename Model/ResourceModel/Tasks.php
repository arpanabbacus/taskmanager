<?php


namespace Magemonkeys\Taskmanager\Model\ResourceModel;

class Tasks extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('magemonkeys_taskmanager_tasks', 'tasks_id');
    }
}
