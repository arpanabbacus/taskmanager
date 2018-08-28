<?php
namespace Magemonkeys\Taskmanager\Model\Tasks\Source;
 
class Status implements \Magento\Framework\Data\OptionSourceInterface
{
    protected $tasks;
 
    public function __construct(\Magemonkeys\Taskmanager\Model\Tasks $tasks)
    {
        $this->tasks = $tasks;
    }
 
    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->getOptionArray();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
 
    public static function getOptionArray()
    {
        return [0 => __('TODO'), 1 => __('In Progress'), 2 => __('Done')];
    }
}