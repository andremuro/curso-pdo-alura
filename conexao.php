<?php

require_once "vendor/autoload.php";

$$databasePath = __DIR__ . "/banco.sqlite";
/**
 * O "sqlite", que está abaixo dentro do objeto é chamado de
 * string de conexão(DNS), podendo variar de acordo com o db utilizado
 * como por exemplo mysql, sql e etc.
 * EX:
 * "mysql:host=endereco_do_servidor;dbname=nome_do_banco"
 */
$pdo = new PDO("sqlite:" . $databasePath);

echo "Conectei";

$pdo->exec("CREATE TABLE students (id INTEGER PRIMARY KEY, name TEXT, birth_date TEXT);");