<?php


namespace Magemonkeys\Taskmanager\Api\Data;

interface TasksInterface
{

    const ENDTIME = 'endtime';
    const STARTTIME = 'starttime';
    const NAME = 'name';
    const TASKS_ID = 'tasks_id';
    const ASSIGNEENAME = 'assigneename';
    const STATUS = 'status';
    const DESCRIPTION = 'description';

    /**
     * Get tasks_id
     * @return string|null
     */
    public function getTasksId();

    /**
     * Set tasks_id
     * @param string $tasksId
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setTasksId($tasksId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setName($name);

    /**
     * Get description
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     * @param string $description
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setDescription($description);

    /**
     * Get starttime
     * @return string|null
     */
    public function getStarttime();

    /**
     * Set starttime
     * @param string $starttime
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setStarttime($starttime);

    /**
     * Get endtime
     * @return string|null
     */
    public function getEndtime();

    /**
     * Set endtime
     * @param string $endtime
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setEndtime($endtime);

    /**
     * Get assigneename
     * @return string|null
     */
    public function getAssigneename();

    /**
     * Set assigneename
     * @param string $assigneename
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setAssigneename($assigneename);

    /**
     * Get status
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     * @param string $status
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     */
    public function setStatus($status);
}
