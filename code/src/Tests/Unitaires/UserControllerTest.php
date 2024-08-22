<?php 
namespace Tests\Unitaires;

use Controllers\UserController;
use PHPUnit\Framework\TestCase;
use Repositories\UserRepository;

class UserControllerTest extends TestCase
{
  public function testIndex()
  {
    $UserController = new UserController;
    $users = (new UserRepository)->getAll();
    $nbUsers = count($users);
    // Capturez la sortie HTML de la méthode index
    ob_start();
    $UserController->index();

    $html = ob_get_clean();

    // Chargez le HTML dans une instance de DOMDocument
    $dom = new \DOMDocument();
    @$dom->loadHTML($html); // Le '@' est utilisé pour ignorer les erreurs de chargement HTML mal formé

    // Utilisez DOMXPath pour interroger le HTML
    $xpath = new \DOMXPath($dom);
    $liElements = $xpath->query('//li');

    $this->assertEquals($nbUsers, $liElements->length);
  }

  public function testIndexAvecUneAutreMéthode()
  {
    ob_start();
    // vérifier qu'il y a autant de <li> qu'on a d'utilisateurs en BDD
    $users = (new UserRepository())->getAll();
    $nbUsers = count($users);
    $UserController = new UserController();
    $UserController->index();

    $this->assertEquals($nbUsers, substr_count(ob_get_clean(), '<li>'));
  }
}