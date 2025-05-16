<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\App;
use App\Router;
use App\Config;
use App\Authentication;
use App\Controllers\{HomeController, UserController, InvoiceController, CurriculumController, CourseController, NewsController, ServiceController, GalleryController};


$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

require(__DIR__.'/../app/includes/helpers.php');

session_start();

define('STORAGE_PATH_IMAGES', __DIR__ . '/assets/images/carousel');
define('STORAGE_PATH_PDF', __DIR__ . '/assets/pdf');
define('VIEW_PATH', __DIR__ . '/../views');


$router = new Router();

$router
    ->get('/', [HomeController::class, 'index'])
    ->post('/mail', [HomeController::class, 'sendEmail'])

    ->get('/admin/login', [Authentication::class, 'login'])
    ->get('/admin', [Authentication::class, 'login'])
    ->post('/admin', [Authentication::class, 'loginSubmit'])
    ->get('/admin/dashboard', [Authentication::class, 'dashboard'])
    ->get('/admin/logout', [Authentication::class, 'logout'])

    ->get('/admin/users', [UserController::class, 'index'])
    ->get('/admin/users/create', [UserController::class, 'create'])
    ->post('/admin/users/create', [UserController::class, 'processCreate'])
    ->get('/admin/users/update', [UserController::class, 'update'])
    ->post('/admin/users/update', [UserController::class, 'processUpdate'])
    ->post('/admin/users/delete', [UserController::class, 'delete'])

    ->get('/admin/curriculum', [CurriculumController::class, 'index'])
    ->get('/admin/curriculum/create', [CurriculumController::class, 'create'])
    ->post('/admin/curriculum/create', [CurriculumController::class, 'processCreate'])
    ->get('/admin/curriculum/update', [CurriculumController::class, 'update'])
    ->post('/admin/curriculum/update', [CurriculumController::class, 'processUpdate'])
    ->post('/admin/curriculum/delete', [CurriculumController::class, 'delete'])

    ->get('/admin/courses', [CourseController::class, 'index'])
    ->get('/admin/courses/create', [CourseController::class, 'create'])
    ->post('/admin/courses/create', [CourseController::class, 'processCreate'])
    ->get('/admin/courses/update', [CourseController::class, 'update'])
    ->post('/admin/courses/update', [CourseController::class, 'processUpdate'])
    ->post('/admin/courses/delete', [CourseController::class, 'delete'])

    ->get('/admin/news', [NewsController::class, 'index'])
    ->get('/admin/news/create', [NewsController::class, 'create'])
    ->post('/admin/news/create', [NewsController::class, 'processCreate'])
    ->get('/admin/news/update', [NewsController::class, 'update'])
    ->post('/admin/news/update', [NewsController::class, 'processUpdate'])
    ->post('/admin/news/delete', [NewsController::class, 'delete'])

    ->get('/admin/services', [ServiceController::class, 'index'])
    ->get('/admin/services/create', [ServiceController::class, 'create'])
    ->post('/admin/services/create', [ServiceController::class, 'processCreate'])
    ->get('/admin/services/update', [ServiceController::class, 'update'])
    ->post('/admin/services/update', [ServiceController::class, 'processUpdate'])
    ->post('/admin/services/delete', [ServiceController::class, 'delete'])

    ->get('/admin/gallery', [GalleryController::class, 'index'])
    ->get('/admin/gallery/create', [GalleryController::class, 'create'])
    ->post('/admin/gallery/create', [GalleryController::class, 'processCreate'])
    ->get('/admin/gallery/update', [GalleryController::class, 'update'])
    ->post('/admin/gallery/update', [GalleryController::class, 'processUpdate'])
    ->post('/admin/gallery/delete', [GalleryController::class, 'delete'])

    ->post('/upload', [HomeController::class, 'upload'])
    ->get('/invoices', [InvoiceController::class, 'index'])
    ->get('/invoices/create', [InvoiceController::class, 'create'])
    ->post('/invoices/create', [InvoiceController::class, 'store']);



(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
)
)->run();