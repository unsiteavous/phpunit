<?php
namespace Tests\Unitaires;
use PHPUnit\Framework\TestCase;
use Services\Validator;

class FunctionTest extends TestCase
{
  public function testVraiEstVrai()
  {
    $this->assertTrue(true);
  }

  public function testExemple()
  {
    $nombre = 1;
    $this->assertEquals(1, $nombre, "Le nombre doit être 1");
    $this->assertIsNumeric($nombre, "Le nombre doit être un nombre");
    $this->assertGreaterThanOrEqual(0, $nombre, "Le nombre doit être positif");
  }
  
    
  public function test_fonction_de_validation_des_emails()
  {
    $validator = new Validator();
    $email = "bon@email.com";

    $this->assertTrue($validator->verifierEmailValide($email), "La fonction devrait renvoyer true");

    $email = "mauvaisemail.com";
    $this->assertFalse($validator->verifierEmailValide($email), "La fonction devrait renvoyer false");
  }

  public function test_fonction_sanitize_marche_bien()
  {
    $validator = new Validator();
    $string = "<script>alert('Hello World!')</script>";

    $this->assertEquals("&lt;script&gt;alert(&#039;Hello World!&#039;)&lt;/script&gt;", $validator->sanitize($string), "La fonction ne nettoie pas correctement la chaine");

    $this->assertStringNotContainsString("<", $validator->sanitize($string), "La fonction ne nettoie pas correctement la chaine");

    $this->assertStringContainsString("&lt;", $validator->sanitize($string), "La fonction ne nettoie pas correctement la chaine");
  }
}