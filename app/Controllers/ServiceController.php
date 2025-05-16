<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\Service;

class ServiceController
{
  private Service $service;

  public function __construct()
  {
    $this->service = new Service();
  }

  public function index()
  {
    return View::make(
      'admin/services/index',
      ['services' => $this->service->findAll('services')]
    );
  }

  public function create()
  {
    return View::make('admin/services/create');
  }

  public function processCreate()
  {
    ['title' => $title, 'ordered' => $ordered] = $_POST['service'];

    $errors = [];
    if ($_FILES['service']['type']['service_path'] !== 'application/pdf') {
      $errors[] = 'No file uploaded or wrong file type uploaded!';
    }
    
    if (empty($errors)) {
      $filePath = STORAGE_PATH_PDF.'/'.$_FILES['service']['name']['service_path'];
      move_uploaded_file($_FILES['service']['tmp_name']['service_path'], $filePath);
  
      $this->service->save(
        'services',
        [
          'title' => validate($title), 
          'service_path' => $_FILES['service']['name']['service_path'], 
          'ordered' => $ordered
        ]
      );
      header('Location: /admin/services');
      exit();
    } else {
      return View::make('admin/services/create', ['errors' => $errors]);
    }   
  }

  public function update()
  {
    return View::make(
      'admin/services/update',
      ['service' => $this->service->findOne('services', 'id', $_GET['id'])]
    );
  }

  public function processUpdate()
  {
    ['id' => $id, 'title' => $title, 'ordered' => $ordered] = $_POST['service'];

    $filePath = STORAGE_PATH_PDF.'/'.$_FILES['service']['name']['service_path'];
    move_uploaded_file($_FILES['service']['tmp_name']['service_path'], $filePath);

    $this->service->save(
      'services',
      ['id' => $id, 'title' => validate($title), 'service_path' => $_FILES['service']['name']['service_path'], 'ordered' => $ordered]
    );
    header('Location: /admin/services');
    exit();
  }

  public function delete()
  {
    $service = $this->service->findOne('services', 'id', $_POST['id']);
    $this->service->delete('services', 'id', $_POST['id']);
    unlink(STORAGE_PATH_PDF.'/'. $service['service_path']);
    header('Location: /admin/services');
    exit();
  }
}