# Criando ORM - PHP do jeito certo
O projeto é a criação de um ORM (Object Relational Mapper ou Mapeador de Objeto Relacional) que permite a abstração do banco de dados (conexões e consultas) utilizando orientação a objetos. 

## Funcionalidades
*  Conexao ao banco de dados
*  Instancia da classe sql(driver)
*  Instanciacao do model
*  Inserção de registros
*  Basca de vários registros
*  Busca de um registro
*  Atualizacao de um registro
*  Remoção de um registro

## Fundamentos - PHP do Jeito Certo

#### Extensão PDO

A PDO é uma biblioteca para abstração de conexões a bancos de dados — embutida no PHP desde a versão 5.1.0 — que fornece uma interface comum para conversar com vários bancos de dados diferentes.

A PDO não irá traduzir suas consultas SQL ou emular funcionalidades que não existem; ela é feita puramente para conectar múltiplos tipos de bancos de dados com a mesma API.

Mais importante, a PDO permite que você injete de forma segura entradas externas (e.g IDs) em suas consultas SQL sem se preocupar com ataques de SQL injection. Isso é possível usando instruções PDO (PDO statements) e parâmetros restritos (bound parameters).


#### Interagindo com o banco de dados
Muitos frameworks fornecem sua própria camada de abstração que pode ou não sobrepor o PDO. Estes muitas vezes simulam características de um sistema de banco de dados que outro banco de dados não possui envolvendo suas consultas em métodos PHP, dando-lhe a abstração real do banco de dados em vez de apenas a abstração da conexão como o PDO oferece.

Isto obviamente adiciona um pequeno peso, mas se você estiver construindo uma aplicação portátil que precise trabalhar com MySQL, PostgreSQL e SQLite, então este pequeno peso vai valer a pena pela limpeza e menos linhas de código.

---

**Mais informações sobre os conceitos e fundamentos utilizados para desenvolvimento:**  
[PHP: Do jeito certo - Banco de dados](https://phptherightway.com/#databases)

**Informações sobre o projeto desenvolvido:**  
[Wiki do projeto](https://github.com/hm-henriquematias/orm-php-TheRightWay/wiki)
