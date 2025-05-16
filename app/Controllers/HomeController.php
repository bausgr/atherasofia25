<?php

declare(strict_types=1);

namespace App\Controllers;

use App\View;
use App\Controllers\MailController;
use App\Models\{Course, Curriculum, Gallery, News, Service};

class HomeController
{
  private Course $courses;
  private Curriculum $curriculum;
  private Gallery $gallery;
  private News $news;
  private Service $services;

  public function __construct()
  {
    $this->courses = new Course();
    $this->curriculum = new Curriculum();
    $this->news = new News();
    $this->services = new Service();
    $this->gallery = new Gallery();
  }


  public function index(): View
  {
    $courses = [];
    $curriculum = $this->curriculum->findAll('curriculum');
    foreach ($curriculum as $cur) {
      $courses['' . $cur['id'] . ''] = $this->courses->findMany('courses', 'curriculum_id', $cur['id'], 'ordered ASC');
    }
    return View::make(
      'index',
      [
        'services' => $this->services->findAll('services', 'ordered ASC'),
        'curriculum' => $this->curriculum->findAll('curriculum', 'ordered ASC'),
        'courses' => $courses,
        'gallery' => $this->gallery->findAll('gallery', 'ordered ASC'),
      ]
    );
  }

  public function sendEmail()
  {

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


    // Get the form fields, removes html tags and whitespace.
    $data = json_decode(file_get_contents("php://input"), true);
    $name = validate($data["name"]);
    $body = validate($data["body"]);
    $email = validate($data["email"]);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Check the data.
    if (empty($name) or empty($body) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      throw new \Exception('Mail could not be sent!');
      exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "info@vasdaris.gr";

    // Set the email subject.
    $subject = "Νέο μήνυμα από τον/την $name";

    // Build the email content.
    $email_content = "Όνομα: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Κείμενο:\n$body\n";

    // Build the email headers.
    $email_headers = "Από: $name <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);
    exit;
  }
}