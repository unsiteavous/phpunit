<?php 
namespace Tests\Unitaires;

use Controllers\UserController;
use PHPUnit\Framework\TestCase;
use Repositories\UserRepository;

class UserControllerTest extends TestCase
{
  public function testIndex()
  {
    // vérifier qu'il y a autant de <li> qu'on a d'utilisateurs en BDD
  }
}