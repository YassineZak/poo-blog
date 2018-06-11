<?php
  /**
   *
   */
  class autoloader
  {
    static function autoload($class_name){ // on rend statique la fonction autoload qui fait appel au dossier des class
      $class_name = str_replace(__NAMESPACE__, '', $class_name); // __NAMESPACE__ est une constante qui fait appel au namespace en general // on modifie le chemin de notre class en supprimant le namespace
      require __DIR__ . '\\' . $class_name . '.class.php';// __DIR__ est  constante qui fait reference au repertoire du fichier en question // on execute la redirection vers le chemin de la classe placé en argument de la fonction autoload  // la fonction autoload nous evite de faire à chaque fois des require de nos class crées.

    }
    static function register(){
      spl_autoload_register(array(__CLASS__, 'autoload')); // cette fonction permet d'appeler la classe autoload sachant qu'elle prend en arguement une class puis une fonction
    }
  }


 ?>
