<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\Curriculum;

class CurriculumController
{
  private Curriculum $curriculum;

  public function __construct()
  {
    $this->curriculum = new Curriculum();
  }

  public function index()
  {
    return View::make(
      'admin/curriculum/index',
      ['curriculum' => $this->curriculum->findAll('curriculum')]
    );
  }

  public function create()
  {
    return View::make('admin/curriculum/create');
  }

  public function processCreate()
  {
    ['title' => $title, 'ordered' => $ordered] = $_POST['curriculum'];

    $this->curriculum->save(
      'curriculum',
      ['title' => validate($title), 'ordered' => $ordered]
    );
    header('Location: /admin/curriculum');
    exit();
  }

  public function update()
  {
    return View::make(
      'admin/curriculum/update',
      ['curriculum' => $this->curriculum->findOne('curriculum', 'id', $_GET['id'])]
    );
  }

  public function processUpdate()
  {
    ['id' => $id, 'title' => $title, 'ordered' => $ordered] = $_POST['curriculum'];
    $this->curriculum->save(
      'curriculum',
      ['id' => $id, 'title' => validate($title), 'ordered' => $ordered]
    );
    header('Location: /admin/curriculum');
    exit();
  }

  public function delete()
  {
    $this->curriculum->delete('curriculum', 'id', $_POST['id']);
    header('Location: /admin/curriculum');
    exit();
  }
}