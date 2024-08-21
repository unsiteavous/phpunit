<?php
namespace Tests\Unitaires;
use PHPUnit\Framework\TestCase;

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
  

}