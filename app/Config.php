<?php

declare(strict_types=1);

namespace App;

class Config {
  protected array $config = [];

  public function __construct(array $env) 
  {
    $this->config = [
      'db' => [
        'host' => $_ENV['DB_HOST'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        'database' => $_ENV['DB_DATABASE'],
        'driver' => $_ENV['DB_DRIVER'] ?? 'mysql',
      ]
    ];
  }

  public function __get(string $name)
  {
    return $this->config[$name] ?? null;
  }
}