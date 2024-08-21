<?php
namespace Services;

use Controllers\HomeController;
use Controllers\UserController;
use Controllers\SecurityController;

$HomeController = new HomeController();
$UserController = new UserController();
$SecurityController = new SecurityController();

$route = $_SERVER['REDIRECT_URL'];
$methode = $_SERVER['REQUEST_METHOD'];

switch($route) {
  case '/':
    $HomeController->index();
    break;
  case '/login':
    if($methode == 'POST') {
      $SecurityController->auth();
    } else {
      $SecurityController->login();
    }
    break;
  case '/logout':
    $SecurityController->logout();
    break;
  case '/account':
    $HomeController->account();
    break;
  case '/account/users':
    $UserController->index();
    break;

  default:
    $HomeController->error404();
    break;
}