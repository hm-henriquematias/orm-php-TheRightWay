<?php

namespace henriquematias\ORM;

use henriquematias\ORM\Drivers\DriverStrategy;

class Model
{
    public function setDriver(DriverStrategy $driver)
    {
        return $driver;
    }

    protected function getDriver()
    {

    }

    public function save()
    {

    }

    public function findAll(array $conditions = [])
    {
        
    }

    public function findFirst($id)
    {
        
    }

    public function delete()
    {
        
    }
}
