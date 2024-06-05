<?php

use App\Controllers\AuthController;
use App\Controllers\ArticleController;
use App\Controllers\HomeController;

// Default route
route('/', function () {
    (new HomeController())->index();
});

// show article
route('/articles/show/(\d+)', function ($id) {
    $controller = new ArticleController();
    $controller->show($id);
});

// Auth routes
route('/login', function () {
    $controller = new AuthController();
    $controller->login();
});

route('/logout', function () {
    $controller = new AuthController();
    $controller->logout();
});

route('/register', function () {
    $controller = new AuthController();
    $controller->register();
});

// Ensure user is logged in
if (!isset($_SESSION['user']) && !in_array($_SERVER['REQUEST_URI'], ['/login', '/register'])) {
    header("Location: /login");
    exit();
}

// User routes
route('/my-profile', function () {
    $controller = new AuthController();
    $controller->editProfile();
});

// Article routes
route('/articles', function () {
    $controller = new ArticleController();
    $controller->index();
});

route('/articles/create', function () {
    $controller = new ArticleController();
    $controller->create();
});

route('/articles/edit/(\d+)', function ($id) {
    $controller = new ArticleController();
    $controller->edit($id);
});

route('/articles/delete/(\d+)', function ($id) {
    $controller = new ArticleController();
    $controller->delete($id);
});

// In case request URL does not match any
view('not-found');