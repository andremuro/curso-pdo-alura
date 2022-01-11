<?php

require_once "vendor/autoload.php";

use Alura\CursoPdo\Student;

$databasePath = __DIR__ . "/banco.sqlite";
$pdo = new PDO("sqlite:" . $databasePath);

$statement = $pdo->query('SELECT * FROM students;');
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