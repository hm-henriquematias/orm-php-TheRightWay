<?php
// Configuração inicial
require __DIR__ . '/vendor/autoload.php';

use henriquematias\ORM\Model;

// Conexao ao banco de dados

//Instancia da classe sql(driver)

//Instanciacao do model
$model = new Model();
echo $model->setDriver('Mysql');

//Inserção de registros

//Basca de vários registros

//Busca de um registro

//Atualizacao de um registro

//Remoção de um registro
