<?php 
namespace Tests\Unitaires;

use Controllers\HomeController;
use PHPUnit\Framework\TestCase;


class HomeControllerTest extends TestCase
{
  public function testIndex()
  {
    $HomeController = new HomeController;
    ob_start();
    $HomeController->index();

    $this->assertEquals('Hello World !', ob_get_clean());
  }



}