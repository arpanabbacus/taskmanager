<?php


namespace Magemonkeys\Taskmanager\Model;

use Magemonkeys\Taskmanager\Api\TasksRepositoryInterface;
use Magento\Framework\Api\DataObjectHelper;
use Magemonkeys\Taskmanager\Model\ResourceModel\Tasks\CollectionFactory as TasksCollectionFactory;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magemonkeys\Taskmanager\Model\ResourceModel\Tasks as ResourceTasks;
use Magemonkeys\Taskmanager\Api\Data\TasksInterfaceFactory;
use Magemonkeys\Taskmanager\Api\Data\TasksSearchResultsInterfaceFactory;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Exception\CouldNotSaveException;

class TasksRepository implements TasksRepositoryInterface
{

    private $storeManager;
    protected $tasksFactory;

    protected $resource;

    protected $tasksCollectionFactory;

    protected $searchResultsFactory;

    protected $dataTasksFactory;

    protected $dataObjectProcessor;

    protected $dataObjectHelper;


    /**
     * @param ResourceTasks $resource
     * @param TasksFactory $tasksFactory
     * @param TasksInterfaceFactory $dataTasksFactory
     * @param TasksCollectionFactory $tasksCollectionFactory
     * @param TasksSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ResourceTasks $resource,
        TasksFactory $tasksFactory,
        TasksInterfaceFactory $dataTasksFactory,
        TasksCollectionFactory $tasksCollectionFactory,
        TasksSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager
    ) {
        $this->resource = $resource;
        $this->tasksFactory = $tasksFactory;
        $this->tasksCollectionFactory = $tasksCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataTasksFactory = $dataTasksFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Magemonkeys\Taskmanager\Api\Data\TasksInterface $tasks
    ) {
        /* if (empty($tasks->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $tasks->setStoreId($storeId);
        } */
        try {
            $this->resource->save($tasks);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the tasks: %1',
                $exception->getMessage()
            ));
        }
        return $tasks;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($tasksId)
    {
        $tasks = $this->tasksFactory->create();
        $this->resource->load($tasks, $tasksId);
        if (!$tasks->getId()) {
            throw new NoSuchEntityException(__('Tasks with id "%1" does not exist.', $tasksId));
        }
        return $tasks;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->tasksCollectionFactory->create();
        foreach ($criteria->getFilterGroups() as $filterGroup) {
            $fields = [];
            $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                if ($filter->getField() === 'store_id') {
                    $collection->addStoreFilter($filter->getValue(), false);
                    continue;
                }
                $fields[] = $filter->getField();
                $condition = $filter->getConditionType() ?: 'eq';
                $conditions[] = [$condition => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
        
        $sortOrders = $criteria->getSortOrders();
        if ($sortOrders) {
            /** @var SortOrder $sortOrder */
            foreach ($sortOrders as $sortOrder) {
                $collection->addOrder(
                    $sortOrder->getField(),
                    ($sortOrder->getDirection() == SortOrder::SORT_ASC) ? 'ASC' : 'DESC'
                );
            }
        }
        $collection->setCurPage($criteria->getCurrentPage());
        $collection->setPageSize($criteria->getPageSize());
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Magemonkeys\Taskmanager\Api\Data\TasksInterface $tasks
    ) {
        try {
            $this->resource->delete($tasks);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Tasks: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($tasksId)
    {
        return $this->delete($this->getById($tasksId));
    }
}
