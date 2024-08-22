# Personnalisation du fichier `composer.json`
le fichier `composer.json` contient toutes les informations qu'on va donner à composer à chaque fois qu'on lui demandera une commande, dans ce dossier. Attention, même si on installe composer de manière générale sur notre ordi, le contenu de ce fichier n'impactera que le dossier en cours. Cela veut dire qu'il faut exécuter nos commandes au bon endroit... 

À l'origine, notre fichier contient juste ça :

```json
{
    "require-dev": {
        "phpunit/phpunit": "^11.3"
    },
}
```
Cela veut dire qu'on utilise PHPUnit que dans le cadre du développement.

## Automatiser des lignes de commande

Ce qui est génial avec `composer`, c'est qu'on peut créer une commande, qui va exécuter pour nous tout ce qu'on veut.

Par exemple, nous voulons exécuter PHPUnit :
- la commande de base, c'est `./vendor/bin/phpunit ./src/Tests/Unitaires/`
- Si on veut avoir un résultat un peu plus précis dans le rendu, on va rajouter le drapeau `--testdox`
- Si on veut de la couleur, on va rajouter `--colors=always`
- Comme on a un fichier autoloader qui doit charger nos classes, on va rajouter `--bootstrap ./src/Services/Autoload.php`

au final, la ligne est longue : 
```bash
./vendor/bin/phpunit --bootstrap ./src/Services/Autoload.php --colors=always --testdox ./src/Tests/Unitaires/
```

Si on doit taper ça à la main tout le temps, c'est galère ! On va commencer par lui rajouter des lignes de scripts. Cela va nous permettre de pouvoir taper une commande, et qu'automatiquement, toute la ligne soit exécutée. On gagne du temps !

Dans le fichier composer, on va donc venir créer des scripts :
```json
{
    "require-dev": {
        "phpunit/phpunit": "^11.3"
    },
    "scripts": {
        "tests_unitaires": "./vendor/bin/phpunit --bootstrap ./src/Services/Autoload.php --colors=always --testdox ./src/Tests/Unitaires/",
        "tests_fonctionnels": "./vendor/bin/phpunit --bootstrap ./src/Services/Autoload.php --colors=always --testdox ./src/Tests/Fonctionnels/"
    }
}
```
De cette manière, quand je veux exécuter les tests unitaires, je n'ai plus qu'à faire 
```bash
composer tests_unitaires
```
et ma commande se réalise ! Pratique ! 

## Optimiser les scripts
Mais on peut aller plus loin.
Pour l'autoloader, plutôt que de l'écrire dans chaque script, je peux le donner en global à composer, pour qu'il l'exécute à chaque commande.

Pour cela, il y a plusieurs méthodes :


</details>

<details>
<summary>1. Avec le chemin du fichier Autoloader.php</summary>

Cette indication précise à composer qu'à chaque fois qu'on va lancer une commande, on va charger notre fichier `src/Services/Autoload.php`. Ainsi, on allège les deux règles de scripts.

```json
{
    "autoload": {
        "files": [
            "./src/Services/Autoload.php"
        ]
    },
    "require-dev": {
        "phpunit/phpunit": "^11.3"
    },
    "scripts": {
        "tests_unitaires": "./vendor/bin/phpunit --colors=always --testdox ./src/Tests/Unitaires/",
        "tests_fonctionnels": "./vendor/bin/phpunit --colors=always --testdox ./src/Tests/Fonctionnels/"
    }
}
```
[📜 Lire la documentation](https://getcomposer.org/doc/04-schema.md#files)


</details>

<details>
<summary>2. Avec psr-4</summary>

`psr-4` est un moyen de récupérer les namespaces sans utiliser l'autoloader, directement en spécifiant où les classes sont censées être rangées. Dans notre cas, quand on appelle `Models\User`, on appelle en fait un fichier qui est rangé dans `src\Models\User`. On dit donc à composer que pour chaque élément, on rajoute devant `./src/`.
```json
{
    "autoload": {
        "psr-4": {
            "": "./src/"
        }
    },
    "require-dev": {
        "phpunit/phpunit": "^11.3"
    },
    "scripts": {
        "tests_unitaires": "./vendor/bin/phpunit --colors=always --testdox ./src/Tests/Unitaires/",
        "tests_fonctionnels": "./vendor/bin/phpunit --colors=always --testdox ./src/Tests/Fonctionnels/"
    }
}
```
[📜 Lire la documentation](https://getcomposer.org/doc/04-schema.md#psr-4)

</details>

<details>
<summary>3. Avec classmap</summary>


Il est aussi possible d'utiliser `classmap` pour préciser à composer où trouver les classes. Dans ce cas, on aura :
```json
{
    "autoload": {
        "classmap": [
            "src/"
        ]
    },
    "require-dev": {
        "phpunit/phpunit": "^11.3"
    },
    "scripts": {
        "tests_unitaires": "./vendor/bin/phpunit --colors=always --testdox ./src/Tests/Unitaires/",
        "tests_fonctionnels": "./vendor/bin/phpunit --colors=always --testdox ./src/Tests/Fonctionnels/"
    }
}
```
[📜 Lire la documentation](https://getcomposer.org/doc/04-schema.md#classmap)

</details>

<br>

> ⚠️ **IMPORTANT** :  
Une fois qu'on a choisi la méthode qu'on préfère, il faut préciser à composer qu'il doit lire ce truc. on fait donc une fois cette commande (si jamais vous changez de méthode, il faut la refaire, pour changer le cache).

```bash
 composer dump-autoload
```

## Pour aller plus loin...
On peut rajouter d'autres drapeaux à notre ligne de commande pour lui permettre d'être plus verbeuse dans certains cas.

 - `--display-warnings` permettra d'expliquer pourquoi il y a une erreur
 - `--display-deprecations` permettra d'expliquer pourquoi il y a une alerte deprécation
 - `--display-notices` permettra d'expliquer pourquoi il y a une notice
 - `--display-errors` permettra d'expliquer pourquoi il y a une erreur
 - ... 

[📜 Lire la documentation](https://docs.phpunit.de/en/11.3/textui.html#command-line-options)