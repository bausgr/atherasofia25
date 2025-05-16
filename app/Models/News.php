<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use PDO;

/**
 * @mixin PDO
 */

class News extends Model {

  public function createNew(string $title, string $text): int 
  {
    $stmt = $this->db->prepare('INSERT INTO news (title, text, created_at) VALUES (?, ?, NOW())');

    $stmt->execute([$title, $text]);

    return (int) $this->db->lastInsertId();
  }
}