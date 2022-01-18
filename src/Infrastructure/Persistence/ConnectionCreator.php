<?php

namespace Alura\CursoPdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
  public static function createConnection()
  {
    $databasePath = __DIR__ . "/../../../banco.sqlite";
    $pdo = new PDO("sqlite:" . $databasePath);
    return $pdo;
  }
}
