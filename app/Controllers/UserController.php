<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\User;

class UserController
{
  private User $user;

  public function __construct()
  {
    $this->user = new User();
  }

  public function index()
  {
    return View::make('admin/users/index', ['users' => $this->user->findAll('users')]);
  }

  public function create()
  {
    return View::make('admin/users/create');
  }

  public function processCreate()
  {
    ['email' => $email, 'password' => $password] = $_POST['user'];
    $errors = $this->validate($email, $password);

    if (count($this->user->findMany('users', 'email', $email)) > 0) { // Prevent from registering twice
      $errors[] = 'That email address is already registered';
    }

    if (empty($errors)) {
      $password = password_hash($password, PASSWORD_DEFAULT); // Hash password
      $this->user->save('users', ['email' => $email, 'password' => $password]);
      header('Location: /admin/users');
      exit();
    } else {
      return View::make('admin/users/create', ['errors' => $errors, 'email' => $email, 'password' => $password]);
    }
  }

  private function validate($email, $password): array
  {
    $email = validate($email);
    $password = validate($password);

    $errors = [];
    if (empty($email)) { // Check for empty fields
      $errors[] = 'E-mail cannot be blank';
    }
    if (empty($password)) { // Check for empty fields
      $errors[] = 'Password cannot be blank';
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) { // Submitted e-mail address validation
      $errors[] = 'Invalid e-mail address';
    }

    return $errors;
  }

  public function update()
  {
    return View::make('admin/users/update', ['user' => $this->user->findOne('users', 'id', $_GET['id'])]);
  }

  public function processUpdate()
  {
    ['id' => $id, 'email' => $email, 'password' => $password] = $_POST['user'];
    $errors = $this->validate($email, $password);

    if (empty($errors)) {
      $password = password_hash($password, PASSWORD_DEFAULT); // Hash password
      $this->user->save('users', ['id' => $id, 'email' => $email, 'password' => $password]);
      header('Location: /admin/users');
      exit();
    } else {
      return View::make('admin/users/update', ['errors' => $errors, 'user' => ['id' => $id, 'email' => $email, 'password' => $password]]);
    }
  }

  public function delete()
  {
    $this->user->delete('users', 'id', $_POST['id']);
    header('Location: /admin/users');
    exit();
  }
}