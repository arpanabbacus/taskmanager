<?php


namespace Magemonkeys\Taskmanager\Model;

use Magemonkeys\Taskmanager\Api\Data\TasksInterface;

class Tasks extends \Magento\Framework\Model\AbstractModel implements TasksInterface
{

    protected $_eventPrefix = 'magemonkeys_taskmanager_tasks';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Magemonkeys\Taskmanager\Model\ResourceModel\Tasks::class);
    }

    /**
     * Get tasks_id
     * @return string
     */
    public function getTasksId()
    {
        return $this->getData(self::TASKS_ID);
    }

    /**
     * Set tasks_id
     * @param string $tasksId
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setTasksId($tasksId)
    {
        return $this->setData(self::TASKS_ID, $tasksId);
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get description
     * @return string
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set description
     * @param string $description
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get starttime
     * @return string
     */
    public function getStarttime()
    {
        return $this->getData(self::STARTTIME);
    }

    /**
     * Set starttime
     * @param string $starttime
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setStarttime($starttime)
    {
        return $this->setData(self::STARTTIME, $starttime);
    }

    /**
     * Get endtime
     * @return string
     */
    public function getEndtime()
    {
        return $this->getData(self::ENDTIME);
    }

    /**
     * Set endtime
     * @param string $endtime
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setEndtime($endtime)
    {
        return $this->setData(self::ENDTIME, $endtime);
    }

    /**
     * Get assigneename
     * @return string
     */
    public function getAssigneename()
    {
        return $this->getData(self::ASSIGNEENAME);
    }

    /**
     * Set assigneename
     * @param string $assigneename
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setAssigneename($assigneename)
    {
        return $this->setData(self::ASSIGNEENAME, $assigneename);
    }

    /**
     * Get status
     * @return string
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set status
     * @param string $status
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
