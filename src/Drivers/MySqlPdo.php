<?php

namespace henriquematias\ORM\Drivers;

use henriquematias\ORM\Model;
use PDO;

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
        if (!empty($data->id)) {
            $query = 'UPDATE %s SET %s';

            $dataToUpdate = $this->params($data);

            $query = sprintf($query, $this->table, $dataToUpdate);
            $query .= ' WHERE id=:id';

            $this->query = $this->pdo->prepare($query);
            $this->bind($data);

            return $this;
        }

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

        $this->bind($data);

        var_dump($query);

        return $this;
    }

    public function select(array $data=[])
    {
        $query = "SELECT * FROM {$this->table}";
        $data = $this->params($data);
        if ($data) {
            $query .= ' WHERE ' . $data;
        }

        $this->query= $this->pdo->prepare($query);
        $this->bind($data);
        return $this;
    }

    public function delete(array $conditions)
    {
        $query = "DELETE * FROM {$this->table}";

        $data = $this->params($conditions);

        if ($data) {
            $query .= ' WHERE ' . $data;
        }
        $this->query = $this->pdo->prepare($query);

        $this->bind($conditions);

        return $this;
    }

    public function exec($query = null)
    {
        if ($query) {
            $this->query = $this->pdo->prepare($query);
        }
        $this->query->execute();
        return $this;
    }

    public function first(array $data=[])
    {
        return $this->query->fetch(PDO::FETCH_ASSOC);
    }

    public function all(array $data=[])
    {
       return $this->query->fetch(PDO::FETCH_ASSOC); 
    }

    protected function params($conditions)
    {
        $field = [];
        foreach ($conditions as $field => $value) {
            $fields[] = $field . '=:' . $field;
        }

        return implode(', ', $fields);
    }

    protected function bind($data) {
        foreach ($data as $field => $value) {
            $this->query->bindValue($field, $value);
        }
    }
}