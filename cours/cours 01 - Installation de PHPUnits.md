# Installation de PHPUnit
Pour faire ces tests, on va s'appuyer sur un outil fabuleux : [PHPUNIT](https://phpunit.de/index.html).

C'est un outil qui va nous permettre, depuis la ligne de commande, de lire nos fichiers de tests, et nous afficher les erreurs potentielles.

Grâce à ça, fini le debug avec des var_dump... (Non je plaisante 😇)

## 1. COMPOSER

Pour l'installer, il vous faudra d'abord installer [composer](https://getcomposer.org/).
Composer est un outil qui nous permet d'installer des librairies dans nos projets PHP. On l'utilisera beaucoup par la suite.

une fois que composer est installé, on peut tester s'il fonctionne bien. Dans un terminal, faites:

```bash
composer -v
```

## 2. PHPUNIT

Mettez-vous dans le dossier src de votre projet, puis tapez la commande suivante

```bash
composer require --dev phpunit/phpunit
```

le `--dev` prévient composer que ce ne sera pas une librairie à mettre dans le projet en production à la fin.

Une fois que cela est fait, on constate qu'un dossier vendor est apparu, ainsi que deux fichiers, composer.json et composer.lock.

Pour tester si tout fonctionne, on peut lancer la commande de PHPUnit, à condition d'être à la racine, au même endroit que notre composer.json et le dossier vendor.

```bash
./vendor/bin/phpunit ./src/Tests/Unitaires/
```