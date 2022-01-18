<?php

require_once "vendor/autoload.php";

use Alura\CursoPdo\Domain\Model\Student;
use Alura\CursoPdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$sqlDelete = "DELETE FROM students WHERE id = ?;";
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 5, PDO::PARAM_INT);
if ($preparedStatement->execute()) {
  echo "Aluno Excluido";
}
