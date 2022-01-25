<?php

namespace Alura\CursoPdo\Domain\Repository;

interface StudentRepository
{
  public function allStudents();
  public function studentsBirthAt($birthDate);
  public function insert($student);
  public function update($student);
  public function save($student);
  public function remove($student);
}
