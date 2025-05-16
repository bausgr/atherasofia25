<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\Gallery;

class GalleryController
{
  private Gallery $img;

  public function __construct()
  {
    $this->img = new Gallery();
  }

  public function index()
  {
    return View::make(
      'admin/gallery/index',
      ['gallery' => $this->img->findAll('gallery')]
    );
  }

  public function create()
  {
    return View::make('admin/gallery/create');
  }

  public function processCreate()
  {
    ['alt' => $alt, 'ordered' => $ordered] = $_POST['img'];
    
    $errors = [];

    if (empty($_FILES['img']['type']['img_path'])) {
      $errors[] = "No file uploaded";
    } else {
       $allowed = ['image/png', 'image/jpg', 'image/jpeg'];
       if (!in_array($_FILES['img']['type']['img_path'], $allowed)) {
       $errors[] = ' Wrong file type uploaded!';
      }
    }

    if (empty($errors)) {
      $filePath = STORAGE_PATH_IMAGES.'/'.$_FILES['img']['name']['img_path'];
      move_uploaded_file($_FILES['img']['tmp_name']['img_path'], $filePath);
  
      $this->img->save(
        'gallery',
        [
          'alt' => validate($alt), 
          'img_path' => validate($_FILES['img']['name']['img_path']), 
          'ordered' => validate($ordered)
        ]
      );
      header('Location: /admin/gallery');
      exit();
    } else {
      return View::make('admin/gallery/create', ['errors' => $errors]);
    }
  }

  public function update()
  {
    return View::make(
      'admin/gallery/update',
      ['img' => $this->img->findOne('gallery', 'id', $_GET['id'])]
    );
  }

  public function processUpdate()
  {
    [
     'id' => $id,
     'alt' => $alt, 
     'img_path_old' => $img_path_old, 
     'ordered' => $ordered
     ] = $_POST['img'];

     $img_path_new = $img_path_old;

    $errors = [];

    if (!empty($_FILES['img']['type']['img_path'])) {
      $img_path_new = $_FILES['img']['name']['img_path'];
      $allowed = ['image/png', 'image/jpg', 'image/jpeg'];
      if (!in_array($_FILES['img']['type']['img_path'], $allowed)) {
        $errors[] = 'Wrong file type uploaded!';
      } else {
        $filePath = STORAGE_PATH_IMAGES.'/'.$_FILES['img']['name']['img_path'];
        move_uploaded_file($_FILES['img']['tmp_name']['img_path'], $filePath);
      }
    }

    if (empty($errors)) {
      $this->img->save('gallery', [
          'id' => $id,
          'alt' => validate($alt), 
          'img_path' => validate($img_path_new), 
          'ordered' => validate($ordered)
        ]
      );
      header('Location: /admin/gallery');
      exit();
    } else {
      return View::make('admin/gallery/update', ['errors' => $errors]);
    }
  }

  public function delete()
  {
    $img = $this->img->findOne('gallery', 'id', $_POST['id']);
    $this->img->delete('gallery', 'id', $_POST['id']);
    unlink(STORAGE_PATH_IMAGES.'/'. $img['img_path']);
    header('Location: /admin/gallery');
    exit();
  }
}