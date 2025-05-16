<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\News;

class NewsController
{
  private News $new;

  public function __construct()
  {
    $this->new = new News();
  }

  public function index()
  {
    return View::make(
      'admin/news/index',
      ['news' => $this->new->findAll('news', 'created_at DESC')]
    );
  }

  public function create()
  {
    return View::make('admin/news/create');
  }

  public function processCreate()
  {
    ['title' => $title, 'text' => $text] = $_POST['new'];

    $this->new->createNew(validate($title), validate($text));

    header('Location: /admin/news');
    exit();
  }

  public function update()
  {
    return View::make(
      'admin/news/update',
      ['new' => $this->new->findOne('news', 'id', $_GET['id'])]
    );
  }

  public function processUpdate()
  {
    ['id' => $id, 'title' => $title, 'text' => $text] = $_POST['new'];
    $this->new->save(
      'news',
      ['id' => $id, 'title' => validate($title), 'text' => validate($text)]
    );
    header('Location: /admin/news');
    exit();
  }

  public function delete()
  {
    $this->new->delete('news', 'id', $_POST['id']);
    header('Location: /admin/news');
    exit();
  }
}