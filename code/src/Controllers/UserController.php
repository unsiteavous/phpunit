<?php

namespace Controllers;

use Repositories\UserRepository;

class UserController
{

  public function index()
  {
    $users = (new UserRepository())->getAll();
    include __DIR__ . "/../Views/user/list.php";
  }
}