<?php

namespace henriquematias\ORM;

use henriquematias\ORM\Drivers\DriverStrategy;

class Model
{
    protected $driver;

    public function setDriver(DriverStrategy $driver)
    {
        $this->driver;
        return $this;
    }

    protected function getDriver()
    {
        return $driver;
    }

    public function save()
    {
        $this->getDriver()
            ->save($this)
            ->exec();
    }

    public function findAll(array $conditions = [])
    {
        return $this->getDriver()
        ->select($conditions)
        ->exec()
        ->all();
    }

    public function findFirst($id)
    {
        return $this->getDriver()
        ->select(['id' => $id])
        ->exec()
        ->first();
    }

    public function delete()
    {
        $this->getDriver()
            ->delete(['id' => $this->id])
            ->exec();
    }
}
