<?php

namespace Agriconecta\Trainee\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Trainee extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('trainee_JoseLopez', 'entity_id');
    }
}
