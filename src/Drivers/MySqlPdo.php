<?php

namespace henriquematias\ORM\Drivers;

use henriquematias\ORM\Model;

class MySqlPdo implements DriverStrategy
{
    protected $pdo;
    protected $table;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function save(Model $data)
    {
        $query = 'INSERT INTO %s (%s) VALUES (%s)';

        $fields = [];
        $fieldsToBind = [];

        foreach ($data as $field => $value) {
            $fields[] = $field;
            $fieldsToBind[] = ':' . $field;
        }
        $fields = implode(',', $fields);
        $fieldsToBind = implode(',', $fieldsToBind);

        $query = sprintf($query, $this->table, $fields, $fieldsToBind);

        $this->query= $this->pdo->prepare($query);

        foreach ($data as $field => $value) {
            $this->query->bindValue($field, $value);
        }

        var_dump($query);

        return $this;
    }

    public function select(array $data=[])
    {

    }

    public function delete(array $data=[])
    {

    }

    public function exec($query = null)
    {
        $this->query->execute();
        return $this;
    }

    public function first(array $data=[])
    {

    }

    public function all(array $data=[])
    {

    }

}