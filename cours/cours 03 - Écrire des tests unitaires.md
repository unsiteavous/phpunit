# Écrire les tests unitaires

Maintenant que tout est paramétré pour lire les tests, il ne nous reste plus qu'à ... écrire les tests !!

Chaque nom de fichier de test doit se finir par `Test`, et chaque classe dans ces fichiers aussi.

par exemple le fichier `FunctionTest.php` contiendra :

```php
<?php
namespace Tests\Unitaires;
use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
  public function testVraiEstVrai()
  {
    $this->assertTrue(true);
  }
}
```

On remarque qu'il faut faire hériter notre classe du parent `TestCase`.

Ensuite, chaque fonction de test doit elle aussi commencer par le mot `test`. 

Ici, il y a plusieurs manière d'écrire vos nom de fonctions, soit en camelCase, soit en snakeCase.

Enfin, il va falloir trouver les assertions intéressantes vous vérifier ce qu'on analyse, et nous permettre de surveiller ce qu'on teste.

Dans l'exemple au-dessus, `assertTrue` attend que ce qui est testé soit vrai. Si on met false dedans, ça échoue.

Il est possible de compléter une assertion avec un message, qui apparaitra lorsque l'assertion ne sera pas validée.

```php
  public function testVraiEstVrai()
  {
    $this->assertTrue(false, 'Vrai devrait être à true');
  }
```

Il est possible de mettre plusieurs assertion pour un même test. Cela permet de vérifier l'information sous différents aspects.

```php
  public function testExemple()
  {
    $nombre = 1;
    $this->assertEquals(1, $nombre, "Le nombre doit être 1");
    $this->assertIsNumeric($nombre, "Le nombre doit être un nombre");
    $this->assertGreaterThanOrEqual(0, $nombre, "Le nombre doit être positif");
  }
```
## liste des assertions
La liste de toutes les assertions se retrouve sur le site de PHPUnit :  
[📜 Lire la documentation](https://docs.phpunit.de/en/11.3/assertions.html)