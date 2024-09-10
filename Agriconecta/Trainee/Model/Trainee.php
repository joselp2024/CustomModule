<?php
namespace Agriconecta\Trainee\Model;

use Magento\Framework\Model\AbstractModel;

class Trainee extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Agriconecta\Trainee\Model\ResourceModel\Trainee::class);
    }
}
