<?php

require_once "vendor/autoload.php";

$databasePath = __DIR__ . "/banco.sqlite";
/**
 * O "sqlite", que está abaixo dentro do objeto é chamado de
 * string de conexão(DNS), podendo variar de acordo com o db utilizado
 * como por exemplo mysql, sql e etc.
 * EX:
 * "mysql:host=endereco_do_servidor;dbname=nome_do_banco"
 */
$pdo = new PDO("sqlite:" . $databasePath);

echo "Conectei";

$pdo->exec("INSERT INTO phones (area_code, number, student_id) VALUES('14','997449319', 1);");
exit();

$createTableSql = '
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY,
        name TEXT,
        birth_date TEXT
    );

    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY(student_id) REFERENCES students(id)
    );
';

$pdo->exec($createTableSql);
