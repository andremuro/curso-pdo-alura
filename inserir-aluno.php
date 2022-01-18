<?php

require_once "vendor/autoload.php";

use Alura\CursoPdo\Domain\Model\Student;
use Alura\CursoPdo\Infrastructure\Persistence\ConnectionCreator;
//Método de criação estático
$pdo = ConnectionCreator::createConnection();

$student = new Student(null, "Jeferson", "1990-09-17");

//Dessa maneira evitamos ataques de SQL Injection, ou seja, o SQL prepata os valores para entrar no db.
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?,?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate());
if ($statement->execute()) {
  echo "Aluno Inserido";
}

/*

Outra maneira de fazer é passando o parametro com o nome, no lugar do ?.
Creio que seja a melhor maneira por ser mais legivel.

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name,:birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(:name, $student->name());
$statement->bindValue(:birth_date, $student->birthDate());
if ($statement->execute()) {
  echo "Aluno Inserido";
}

echo $sqlInsert = "DELETE from students WHERE id = 2";
$sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}','{$student->birthDate()}');";
echo $pdo->exec($sqlInsert);

*/
