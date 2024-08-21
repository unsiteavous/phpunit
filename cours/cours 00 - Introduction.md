# Introduction

On le fait tous naturellement : Est-ce que ma nouvelle méthode `getAllFilms()` fonctionne ? et hop, on va faire un essai.

En fait, c'est un procédé qui mérite qu'on s'y attarde sérieusement. Faire des tests pour savoir si l'application fonctionne, c'est très important. Et pas juste à un instant T, mais un peu tout le temps.

En effet, il n'y a rien de pire que l'ajout d'une feature, qui casse un truc qui marchait avant... et qu'on s'en rend compte que bien plus tard, quand on a à nouveau besoin du truc pété.

On va donc mettre en place des tests qui pourront être faits quand on veut.

## Tests Unitaires

Il y a deux sortes de tests. Les premiers sont les tests unitaires. Cela veut dire qu'ils permettent de tester un élément. par exemple, est-ce que ma fonction verifierEmailValide() fonctionne bien comme attendu ?

On ne s'intéresse ici qu'au bon fonctionnement d'un seul bout de code.

exemple :

```php
public function verifierEmailValide(string $email): bool
{
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}
```

Pour savoir si ma fonction travaille correctement, je dois la tester dans plusieurs cas : avec une bonne et une mauvaise adresse mail.

## Tests Fonctionnels

L'autre sorte de tests, ce sont les tests fonctionnels. Ceux-là sont plus complexes, car ils s'occupent de toute la chaîne des répercutions liées à une action utilisateur.

Par exemple, un utilisateur qui tente de se connecter.

1. Il va soumettre le formulaire,
2. le traitement va le vérifier, puis appeler la classe nécessaire,
3. le repository associé va être convoqué pour lire la BDD,
4. en fonction du résultat une vue sera renvoyée à l'utilisateur.

Et potentiellement, il peut y avoir des bugs un peu partout le long du parcours de la donnée.

On fait donc un test d'ensemble, parce que même si les tests unitaires répondent que tout marche séparément, parfois la mise à la suite de plusieurs actions crée des comportements inattendus.