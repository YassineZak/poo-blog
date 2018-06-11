<?php

  /**
   *
   */
  class database // on crée notre classe database qui fera notre connexion à notre base de données//
  {
      private $db_name; // on declare nos variables en tant que proprietés de notre classe qui seront passé en argument des fonctions
      private $db_user;
      private $db_pass;
      private $db_host;
      private $pdo;

    function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost') //  on fait passé en argument directement dans la class les données de connexion à la base de donnée//
    {
      $this->db_name = $db_name;
      $this->db_user = $db_user;
      $this->db_pass = $db_pass;
      $this->db_host = $db_host;
    }
    public function getPdo(){ // cette fonction va nous permettre de récupérer la connexion à notre base de données en instanciant un objet $pdo de la class pdo
      if ($this->pdo === null) { // cela nous permet d'eviter de faire a chaque fois une connexion à notre base de données.
        try
          {
            $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
          }
          catch (Exception $e)
          {
                  die('Erreur : ' . $e->getMessage());
          }
          $this->pdo = $pdo;
          return $pdo;
      }
      else {
        return $this->pdo; // sinon retourne la propriété pdo pour nous éviter de de faire plusieurs appel à notre base de données
      }

    }

        public function query($statement, $class_name){ // on déclare en proprietés de la classe database une fonction query qui nous permettra d'utiliser le query de la classe pdo ainsi que le fetch afin de faire des requetes sur la bdd
          $result = $this->getPdo()->query($statement); // on utlise la fonction getPdo afin de récupérer le pdo pour pouvoir accéder au query afin de pouvoir executer notre fonction sql

          $data = $result->fetchall(PDO::FETCH_CLASS, $class_name);
          return $data;

        }
        public function prepare($statement, $attributes = null, $class_name, $toutResult = true){
          $req = $this->getPdo()->prepare($statement); //on utlise la fonction getPdo afin de récupérer le pdo pour pouvoir accéder au prepare plus sécurisé que le query afin de pouvoir executer notre fonction sql
          $req->execute($attributes); // le execute prend en argument le tableau de nos parametres saisi
          $result = $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

          if ($toutResult) { // si notre requete concerne plus d'un resultat on utilise un fetch all
            $data = $req->fetchObject();
          }
          else {
            $data = $req->fetchObject();// si notre requette concerne un resultat on execute un simpte fetch
          }
            return $data;

        }


  }


 ?>
