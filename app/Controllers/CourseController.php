<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Models\{Course, Curriculum};

class CourseController
{
  private Course $course;
  private Curriculum $curriculum;

  public function __construct()
  {
    $this->course = new Course();
    $this->curriculum = new Curriculum();
  }

  public function index()
  {
    return View::make('admin/courses/index', ['courses' => $this->course->findAllCourses()]);
  }

  public function create()
  {
    return View::make('admin/courses/create', ['curriculum' => $this->curriculum->findAll('curriculum')]);
  }

  public function processCreate()
  {
    ['title' => $title, 'curriculum_id' => $curriculum_id, 'num_hours' => $num_hours, 'ordered' => $ordered] = $_POST['course'];
    $this->course->save(
      'courses',
      ['title' => validate($title), 'curriculum_id' => $curriculum_id, 'num_hours' => $num_hours, 'ordered' => $ordered]
    );
    header('Location: /admin/courses');
    exit();
  }

  public function update()
  {
    return View::make(
      'admin/courses/update',
      [
        'course' => $this->course->findOne('courses', 'id', $_GET['id']),
        'curriculum' => $this->curriculum->findAll('curriculum')
      ]
    );
  }

  public function processUpdate()
  {
    [
      'id' => $id, 
      'curriculum_id' => $curriculum_id, 
      'num_hours' => $num_hours, 
      'title' => $title, 
      'ordered' => $ordered
    ] = $_POST['course'];
    
    $this->course->save(
      'courses', [
        'id' => $id, 
        'curriculum_id' => $curriculum_id, 
        'num_hours' => $num_hours, 
        'title' => validate($title), 
        'ordered' => $ordered
        ]
    );
    header('Location: /admin/courses');
    exit();
  }

  public function delete()
  {
    $this->course->delete('courses', 'id', $_POST['id']);
    header('Location: /admin/courses');
    exit();
  }
}