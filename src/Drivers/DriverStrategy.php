<?php

namespace henriquematias\ORM\Drivers;

use henriquematias\ORM\Model;

interface DriverStrategy
{
    public function save(Model $data);
    public function select(array $data=[]);
    public function delete(array $data=[]);
    public function exec($query = null);
    public function first(array $data=[]);
    public function all(array $data=[]);
}