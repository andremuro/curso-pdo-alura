<?php

require_once "vendor/autoload.php";

use Alura\CursoPdo\Student;

$databasePath = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:" . $databasePath);

$statement = $pdo->query('SELECT * FROM students;');
$statementList = $statement->fetchAll();



echo '<pre>' . $statementList[0][1] . '</pre>';
echo '<pre>' . $statementList[0]['name'] . '</pre>';
