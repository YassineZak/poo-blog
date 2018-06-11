<?php

    /**
     *
     */
    class config // on crée une class qui nous permette de récupérer l'ensemble des information que l'on va saisir dans notre page configuration
    {
      private $settings = [];  // on crée une propriété qui contient un tableau vide que l'on va définir par la suite dans le constructeur de la class pour récupérer l'ensemble des information de
      private static $_instance; // on crée cette propriété qui nous permettera d'eviter à chaque fois d'instancier un nouvel objet config
      public static function getInstance (){  // on crée une fonction statique qui nous créera l'instance de la class config seulement si la $_instance ne contient pas déja une instance
        if (is_null(self::$_instance)) {
          self::$_instance = new config();
          return self::$_instance;
        }
        else {
          return self::$_instance;
        }
      }
      public  function __construct(){
      $this->settings =  require dirname(__DIR__) .'\config\configuration.php'; // on fait un require afin que notre variable qui contient un tableau vide récupére le tableau saisi dans notre page configuration
      }

    public static function get($key){ // cette fonction va nous permettre de récupérer la valeur de chaque information de connexion de notre base de données
        $tab = get_object_vars(self::getInstance()); //transforme notre objet en tableau
        return $tab['settings'][$key];
    }

  }

 ?>
