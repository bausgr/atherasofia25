<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use PDO;

/**
 * @mixin PDO
 */

class User extends Model
{

  public function login(string $email, string $password): bool
  {

    $user = $this->findOne('users', 'email', $email);

    if (!empty($user) && password_verify($password, $user['password'])) {
      session_regenerate_id();
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $user['password'];
      return true;
    } else {
      return false;
    }
  }

  public function isLoggedIn(): bool
  {
    if (empty($_SESSION['email'])) {
      return false;
    }
    $user = $this->findOne('users', 'email', $_SESSION['email']);

    if (!empty($user) && $user['password'] === $_SESSION['password']) {
      return true;
    } else {
      return false;
    }
  }

  public function getLoggedInUser(): ?array // alt: object (must convert returned array to object 
  {
    if ($this->isLoggedIn()) {
      return $this->findOne('users', 'email', $_SESSION['email']);
    } else {
      return null;
    }
  }
}
