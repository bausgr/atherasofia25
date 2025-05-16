<?php

declare(strict_types=1);

namespace App;

use PDO;

/**
 * @mixin PDO
 */

class DB
{

  private PDO $pdo;

  public function __construct(array $config)
  {

    $defaultOptions = [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES => false
    ];

    try {
      $this->pdo = new PDO(
        $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
        $config['user'],
        $config['password'],
        $config['options'] ?? $defaultOptions
      );
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), $e->getcode());
    }
  }

  public function __call(string $name, array $args)
  {
    return call_user_func_array([$this->pdo, $name], $args);
  }
}
