<?php


namespace Magemonkeys\Taskmanager\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface TasksRepositoryInterface
{

    /**
     * Save Tasks
     * @param \Magemonkeys\Taskmanager\Api\Data\TasksInterface $tasks
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Magemonkeys\Taskmanager\Api\Data\TasksInterface $tasks
    );

    /**
     * Retrieve Tasks
     * @param string $tasksId
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($tasksId);

    /**
     * Retrieve Tasks matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Tasks
     * @param \Magemonkeys\Taskmanager\Api\Data\TasksInterface $tasks
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Magemonkeys\Taskmanager\Api\Data\TasksInterface $tasks
    );

    /**
     * Delete Tasks by ID
     * @param string $tasksId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($tasksId);
}
