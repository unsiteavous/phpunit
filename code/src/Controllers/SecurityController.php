<?php
namespace Controllers;

use Repositories\UserRepository;

class SecurityController
{
  public function login()
  {
    include __DIR__ . "/../Views/login.php";
  }

  public function auth()
  {
    if (isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $userRepository = new UserRepository();
      $user = $userRepository->getByEmail($email);
      if ($user && $password === $user->getPassword()) {
        
        $_SESSION['user_id'] = $user->getId();
        header("Location: /account", true, 200);
      } else {
        header("Location: /login?error", true, 302);
      }
    }
  }

  public function logout()
  {
    session_destroy();
    header("Location: /");
  }
}