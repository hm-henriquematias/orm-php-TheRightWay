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

//Instanciacao do model
$model = new Model;
$model->setDriver($driver);

//Inserção de registros
$model->name = 'Henrique';
$model->save();

//Basca de vários registros

//Busca de um registro

//Atualizacao de um registro

//Remoção de um registro
