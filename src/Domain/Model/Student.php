<?php

namespace Alura\CursoPdo\Domain\Model;

class Student
{
  private $id;
  private string $name;
  private \DateTimeInterface $birthDate;
  private array $phones = [];

  public function __construct($id, $name, $birthDate)
  {
    $this->id = $id;
    $this->name = $name;
    $this->birthDate = $birthDate;
  }

  public function defineId($id)
  {
    if (!is_null($this->id)) {
      throw new \DomainException('Você só pode definir o ID uma vez');
    }

    $this->id = $id;
  }

  public function id()
  {
    return $this->id;
  }

  public function name()
  {
    return $this->name;
  }

  public function changeName($newName)
  {
    $this->name = $newName;
  }

  public function birthDate()
  {
    return $this->birthDate;
  }

  public function age()
  {
    return $this->birthDate
      ->diff(new \DateTimeImmutable())
      ->y;
  }

  public function addPhone($phone)
  {
    $this->phones[] = $phone;
  }

  public function phones()
  {
    return $this->phones;
  }
}
