<?php

namespace Alura\CursoPdo\Domain\Repository;

interface StudentRepository
{
  public function allStudent();
  public function studentsBirthDate($birthDate);
  public function save($student);
  public function remove($student);
}
