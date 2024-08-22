<?php

namespace Controllers;

class HomeController
{
  public function index()
  {
    include __DIR__ . '/../Views/home.php';
  }

  public function account()
  {
    if(isset($_SESSION['user_id'])) {
      http_response_code(200);
      include __DIR__ . '/../views/account.php';
    } else {
      header('Location: /login', true, 302);
    }
  }

  public function error404()
  {
    include __DIR__ . '/../views/404.php';
  }
}
