<?php

use Alura\CursoPdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\CursoPdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\CursoPdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

/**
 * beginTransaction() => Faz com que fique guardado todos os comando antes de executar no commit();
 * commit()=> Fala que agora pode executar todos os comandos que estão guardados no beginTransaction(); 
 */

try {
  $connection->beginTransaction();

  $aStudent = new Student(
    null,
    'Nico Steppat',
    new DateTimeImmutable('1985-05-01')
  );

  $bStudent = new Student(
    null,
    'Sergio Lopes',
    new DateTimeImmutable('1985-05-01')
  );

  $studentRepository->save($aStudent);
  $studentRepository->save($bStudent);

  $connection->commit();
} catch (\RuntimeException $e) {
  echo $e->getMessage();
  $connection->rollBack();
}
