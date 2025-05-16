<?php

declare(strict_types=1);

namespace App;

/**
 * $property-read ?array $db
 */

use App\DB;
use App\Config;
use App\View;
use App\Exceptions\RouteNotFoundException;

class App
{

  private static DB $db;

  public function __construct(protected Router $router, protected array $request, protected Config $config)
  {

    static::$db = new DB($config->db ?? []);
  }

  public static function db(): DB
  {
    return static::$db; // creates a single instance of a database connection
  }

  public function run()
  {
    try {

      echo $this->router->resolve(
        $this->request['uri'],
        strtolower($this->request['method'])
      );
    } catch (RouteNotFoundException) {
      // header('HTTP/1.1 400 Not Found');
      http_response_code(404);
      echo View::make('error/404');
    }
  }
}
