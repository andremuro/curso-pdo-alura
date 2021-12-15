<?php

namespace Alura\CursoPdo;

class Student 
{
  private $id;
  private $name;
  private $birthDate;

  public function __construct($id, $name, $birthDate)
  {
    $this->id = $id;
    $this->name = $name;
    $this->birthDate = $birthDate;

  }
  public function id()
  {
    return $this->id;
  }
  public function name()
  {
    return $this->name;
  }
  public function birthDate()
  {
    return $this->birthDate;
  }
  public function age()
  {
    
  }
}