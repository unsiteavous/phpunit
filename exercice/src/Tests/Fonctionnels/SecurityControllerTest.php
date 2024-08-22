<?php
namespace Tests\Fonctionnels;
use PHPUnit\Framework\TestCase;
use Controllers\SecurityController;
use Controllers\HomeController;

class SecurityControllerTest extends TestCase
{
  public function testLoginPage()
  {
    // Vérifier qu'il existe bien un input email et un input password
  }

  public function testAccessAccountAuthorized()
  {
    // Vérifier que si je suis déjà connecté (en session), alors je vois la page account
  }

  public function testAccessAccountDenied()
  {
    // Vérifier que si je ne suis pas connecté (session vide), alors je ne peux pas voir la page account
  }

  public function testRouteLoginAvecMauvaiseSoumission()
  {
    // J'essaie de simuler un formulaire de login mal soumis
  }

  public function testRouteLoginAvecBonneSoumission()
  {
    // J'essaie de simuler un formulaire de login bien soumis
  }

}