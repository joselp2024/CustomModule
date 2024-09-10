<?php
namespace Agriconecta\Trainee\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class TraineeFactory
{
    protected $objectManager;

    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function create()
    {
        return $this->objectManager->create('Agriconecta\Trainee\Model\Trainee');
    }
}
