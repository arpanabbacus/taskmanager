<?php


namespace Magemonkeys\Taskmanager\Model\ResourceModel\Tasks;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(
            \Magemonkeys\Taskmanager\Model\Tasks::class,
            \Magemonkeys\Taskmanager\Model\ResourceModel\Tasks::class
        );
    }
}
