<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;
use PDO;

/**
 * @mixin PDO
 */

class Course extends Model
{

  public function findAllCourses(): array // can typehint this to array
  {
    $stmt = $this->db->prepare('
    SELECT courses.id AS id, curriculum.title As curriculumTitle, courses.title as courseTitle, num_hours, courses.ordered
    FROM courses
    LEFT JOIN curriculum ON curriculum.id = courses.curriculum_id');

    $stmt->execute();

    $courses = $stmt->fetchAll();

    return $courses ? $courses : [];
  }
}
