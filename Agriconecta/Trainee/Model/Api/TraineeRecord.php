<?php

namespace Agriconecta\Trainee\Model\Api;

use Agriconecta\Trainee\Api\TraineeRecordInterface;
use Magento\Framework\App\ResourceConnection;

class TraineeRecord implements TraineeRecordInterface
{
    protected $resource;

    public function __construct(
        ResourceConnection $resource
    ) {
        $this->resource = $resource;
    }

   
    public function getRecords()
    {
        $connection = $this->resource->getConnection();
        
        $tableName = $this->resource->getTableName('trainee_JoseLopez');
        $select = $connection->select()->from($tableName);
        $result = $connection->fetchAll($select);

        return $result;
    }
}
