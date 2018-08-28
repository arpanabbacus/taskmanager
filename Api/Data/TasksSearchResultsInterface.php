<?php


namespace Magemonkeys\Taskmanager\Api\Data;

interface TasksSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Tasks list.
     * @return \Magemonkeys\Taskmanager\Api\Data\TasksInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Magemonkeys\Taskmanager\Api\Data\TasksInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
