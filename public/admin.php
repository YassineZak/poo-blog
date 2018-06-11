<?php

  require '../app/autoloader.class.php'; // on charge la class autoloader
  autoloader::register(); // on execute la fonction qui nous permettra de charger le reste des classes

  if (isset($_GET['p'])) {
    $p = $_GET['p'];
  }
  else{
    $p = 'articles/index';
  }
  $config = config::get('db_user'); // on recupére le nom d'utilisateur de notre bdd
      /////////////////////////////////////////
    ob_start(); // cette fonction permet de ne pas afficher la page du require mais plutot de la stocker dans une variable
      require '../admin/' . $p . '.php';
      $content = ob_get_clean(); // je stock l'ensemble de la page que je recupere dans le requier dans une variable.
      require '../pages/templates/default.php';// on charge le template par defaut dans lequel on a inséré notre variable afin de récupérer le contenu de la page souhaité cela nous evite de mettre à chaque fois le html commun à nos pages.

 ?>
