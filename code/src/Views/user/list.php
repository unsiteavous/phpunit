<h1>Liste des utilisateurs</h1>

<ul>
  <?php
  foreach ($users as $user) {
    echo '<li>' . $user->getName() . '</li>';
  }
  ?>
</ul>