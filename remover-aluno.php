<?php

require_once "vendor/autoload.php";

use Alura\CursoPdo\Student;

$databasePath = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:" . $databasePath);

$sqlDelete = "DELETE FROM students WHERE id = ?;";
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 5, PDO::PARAM_INT);
if ($preparedStatement->execute()) {
  echo "Aluno Excluido";
}
