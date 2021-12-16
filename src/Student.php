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
  public function age($birthDate)
  {
    $date = date('Y-m-d', strtotime($birthDate));
    $birthDate = explode("-",$date);
    $age = date("Y") - $birthDate[0];
    if (date("m") < $birthDate[1]) 
    {
      $age -= 1;
    } elseif ((date("m") == $birthDate[1]) && (date("d") <= $birthDate[2]))
    {
      $age -= 1;
    }
    return $age;
  }
}