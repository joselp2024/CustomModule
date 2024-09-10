<?php

namespace Agriconecta\Trainee\Model\ResourceModel\Trainee;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Agriconecta\Trainee\Model\Trainee',
            'Agriconecta\Trainee\Model\ResourceModel\Trainee'
        );
    }
}
