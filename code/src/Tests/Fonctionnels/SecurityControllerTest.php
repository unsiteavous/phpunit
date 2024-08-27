<?php
namespace Tests\Fonctionnels;
use PHPUnit\Framework\TestCase;
use Controllers\SecurityController;
use Controllers\HomeController;

class SecurityControllerTest extends TestCase
{
  public function testLoginPage()
  {
    $SecurityController = new SecurityController();
    ob_start();
    $SecurityController->login();

    $html = ob_get_clean();

    $dom = new \DOMDocument();
    @$dom->loadHTML($html); // Le '@' est utilisé pour ignorer les erreurs de chargement HTML mal formé

    // On utilise DOMXPath pour interroger le HTML
    $xpath = new \DOMXPath($dom);
    $input = $xpath->query('//input[@id="email"]');
    $this->assertEquals(1, $input->length, "Le formulaire doit contenir un champ 'email'");

    $input = $xpath->query('//input[@id="password"]');
    $this->assertEquals(1, $input->length, "Le formulaire doit contenir un champ 'password'");
  }

  public function testAccessAccountAuthorized()
  {
    $_SESSION['user_id'] = 1;
    $HomeController = new HomeController;
    ob_start();
    $HomeController->account();
    $this->assertEquals(200, http_response_code());
    $this->assertEquals('<h1>This is the Account page !</h1>', ob_get_clean());

    unset($_SESSION['user_id']);
  }

  public function testAccessAccountDenied()
  {
    if(isset($_SESSION['user_id'])) {
      unset($_SESSION['user_id']);
    }
    $HomeController = new HomeController;
    $HomeController->account();
    $this->assertEquals(302, http_response_code());
  }

  public function testRouteLoginAvecMauvaiseSoumission()
  {
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_SERVER['REDIRECT_URL'] = '/login';
    $_POST['email'] = '9sQpG@example.com';
    $_POST['password'] = 'password';

    require __DIR__ . '/../../Services/Router.php';

    $this->assertEquals(302, http_response_code());
  }

  public function testRouteLoginAvecBonneSoumission()
  {
    $_SERVER['REQUEST_METHOD'] = 'POST';
    $_SERVER['REDIRECT_URL'] = '/login';
    $_POST['email'] = 'denis@simplon.co';
    $_POST['password'] = 'TEST';

    require __DIR__ . '/../../Services/Router.php';

    $this->assertEquals(200, http_response_code());
  }

}