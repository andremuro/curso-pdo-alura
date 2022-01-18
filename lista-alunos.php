<?php

require_once "vendor/autoload.php";

use Alura\CursoPdo\Domain\Model\Student;
use Alura\CursoPdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students;');
//var_dump($statement->fetchColumn(1));exit; Traz apenas uma coluna. No caso é o Nome.
//var_dump($statement->fetch(PDO::FETCH_ASSOC));exit; Traz apenas o primeiro dado.
$statementList = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


<html>

<head>
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <div class='table'>
    <table>
      <?php
      foreach ($statementList as $key => $value) {
        echo "<tr>" . "<td>" . $value['id'] . "</td>" . "<td>" . $value['name'] . "</td>" . "<td>" . $value['birth_date'] . "</td>" . "</tr>";
      }
      ?>
    </table>
  </div>
</body>

</html>