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
    
    $databasePath = __DIR__ . "/banco.sqlite";
    $pdo = new PDO("sqlite:" . $databasePath);
    $student = new Student( null, "André Muro", "1998-08-07");
    
    $sqlInsert = "INSERT INTO students (name, birth_date) VALUES ('{$student->name()}','{$student->birthDate()}');";
    echo $pdo->exec($sqlInsert);

  ?>
</body>
</html>