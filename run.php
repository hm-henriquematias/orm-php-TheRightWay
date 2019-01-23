<?php
// Configuração inicial
require __DIR__ . '/vendor/autoload.php';

use henriquematias\ORM\Model;
use henriquematias\ORM\Drivers\MySqlPdo;

// Conexao ao banco de dados
$pdo = new PDO('mysql:host=localhost; dbname=orm_php', 'root', 'root');

//Instancia da classe sql(driver)
$driver = new MySqlPdo($pdo);
$driver->setTable('users');

// Exemplo de execução com o driver
$driver->exec('truncate users;');

//Instanciacao do model
$model = new Model;
$model->setDriver($driver);

//Inserção de registros
$model->name = 'Henrique';
$model->age = 22;
$model->email = 'henriquematiasdesouza@gmail.com';
$model->save();

//Busca de vários registros
var_dump($model->findAll());

//Busca de um registro
// var_dump($model->findFirst(1));

//Atualizacao de um registro
$model->id = 1;
$model->name = 'joão';
$model->save();
var_dump($model->findAll());

// var_dump($model->findFirst(2));

//Remoção de um registro
$model->id = 1;
$model->delete();
var_dump($model->findAll());
