<?php
namespace Tests\Unitaires;

use PHPUnit\Framework\TestCase;
use Repositories\UserRepository;
use Models\User;

class UserRepositoryTest extends TestCase
{
  public function test_Récupérer_un_utilisateur_par_son_id()
  {
    $userRepository = new UserRepository();
    $user = $userRepository->getById(1);
    $this->assertInstanceOf(User::class, $user);
  }

  public function test_Récupérer_tous_les_utilisateurs()
  {
    $userRepository = new UserRepository();
    $users = $userRepository->getAll();
    $this->assertNotEmpty($users);
    $this->assertIsArray($users);
    $this->assertContainsOnlyInstancesOf('Models\User', $users);
  }


}