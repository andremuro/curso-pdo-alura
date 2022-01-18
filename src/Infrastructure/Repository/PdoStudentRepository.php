<?php

namespace Alura\CursoPdo\Infrastructure\Repository;

use Alura\CursoPdo\Domain\Model\Student;
use Alura\CursoPdo\Domain\Repository\StudentRepository;
use Alura\CursoPdo\Infrastructure\Persistence\ConnectionCreator;

class PdoStudentRepository implements StudentRepository
{
  public function __construct()
  {
    $this->connection = ConnectionCreator::createConnection();
  }
  public function allStudent()
  {
  }
  public function studentsBirthDate($birthDate)
  {
  }
  public function save($student)
  {
  }
  public function remove($student)
  {
  }
}
