<?php

function ClassLoader($classe)
{
  try {
      $classe = str_replace('src', '', $classe);
      $classe = str_replace('\\', '/', $classe);
      if (file_exists(__DIR__ . '/../' . $classe . ".php")) {
      require_once __DIR__ . '/../' . $classe . ".php";
    } else {
      throw new \Error("La classe $classe est introuvable.");
    }
  } catch (\Error $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
  }
}


spl_autoload_register('ClassLoader');
