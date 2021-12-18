<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Curso PDO</title>
</head>
<body>
  <?php

    require_once "vendor/autoload.php";
    use Alura\CursoPdo\Student;
    
    $student = new Student( 001, "André Muro", "07-08-1998");
    
    echo $andre = $student->id() . "</br>";
    //echo $andre = $student->age('1974-08-13') . "</br>";

  ?>
</body>
</html>