<?php

namespace Agriconecta\Trainee\Api;

interface TraineeRecordInterface
{
    /**
     * get list or registers of trainee records
     * @return \Agriconecta\Trainee\Api\TraineeRecordInterface[]
     */
    public function getRecords();
}
