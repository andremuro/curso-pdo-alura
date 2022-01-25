<?php

require_once "vendor/autoload.php";

use Alura\CursoPdo\Domain\Model\Student;
use Alura\CursoPdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$sqlDelete = "DELETE FROM students WHERE id = ?;";
$preparedStatement = $pdo->prepare($sqlDelete);

$idPrimeiro = 3;
$idUltimo = 36;

for ($x = $idPrimeiro; $x <= $idUltimo; $x++) {
  $preparedStatement->bindValue(1, $x, PDO::PARAM_INT);
  if ($preparedStatement->execute()) {
    echo $x . " - " . "Aluno Excluido </br>";
  }
}
