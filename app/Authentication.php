<?php

declare(strict_types=1);

namespace App;

use App\App;
use App\View;
use App\Models\User;

class Authentication
{
  private static array $restrictedPages = [
    '/admin/dashboard',
    '/admin/users',
    '/admin/users/create',
    '/admin/users/update',
    '/admin/users/delete'
  ];

  public function login()
  {
    return View::make('admin/login');
  }

  public function dashboard()
  {
    return View::make('admin/dashboard');
  }

  public static function checkLogin(string $uri): ?string
  {
    if (in_array($uri, self::$restrictedPages) && !self::isLoggedIn()) {
      header('location: /admin/login');
      exit();
    }
    return $uri;
  }

  public function loginSubmit()
  {
    $success = $this->authenticate($_POST['email'], $_POST['password']);
    if ($success) {
      return View::make('admin/dashboard');
    } else {
      $errors[] = 'Could not log in. Please try again!';
      return View::make('admin/login', ['errors' => $errors]);
    }
  }

  private static function isLoggedIn(): bool
  {
    if (empty($_SESSION['email'])) {
      return false;
    }
    $userModel = new User();
    $user = $userModel->findOne('users', 'email', $_SESSION['email']);

    if (!empty($user) && $user['password'] === $_SESSION['password']) {
      return true;
    } else {
      return false;
    }
  }

  private function authenticate(string $email, string $password): bool
  {
    $userModel = new User();
    $user = $userModel->findOne('users', 'email', strtolower($email));

    if (!empty($user) && password_verify($password, $user['password'])) {
      session_regenerate_id();
      $_SESSION['email'] = $email;
      $_SESSION['password'] = $user['password'];
      return true;
    } else {
      return false;
    }
  }

  public function logout()
  {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    session_regenerate_id();
    header('location: /');
  }
}
