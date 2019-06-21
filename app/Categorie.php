<?php
  namespace app;
  use app\Article;
  use app\App;

  /**
   *
   */
  class Categorie extends article
  {
    private static $table = 'categorie'; // on crée une variable static cela nous permettra d'appeler dynamiquement les tables dans notre requete sql

    public static function all(){ // on crée la fonction all qui nous permettra de récupérer l'ensemble des categories de notre blog
      return App::getDb()->query("SELECT * FROM " .  self::$table . "", __CLASS__); // on execute notre fonction statique de la class app qui nous permet de récupérer la connexion à la base de données et de faire nos requetes sql
    }

    public static function find($get){ // cette fonction va nous permettre de séléctionner la categorie que l'on souhaite en la récuperant via son id en GET
      return App::getDb()->prepare("SELECT * FROM " .  self::$table . " WHERE id = ?", [$get], __CLASS__, true);
    }


    public static function getArticleByCategorie($id){ // cette fonction nous permettera de récupérer les articles avec leur categorie
        return App::getDb()->query("SELECT * FROM articles LEFT JOIN categorie ON categorie.id = articles.categorie_id LEFT JOIN users ON users.id_user = articles.users_id WHERE articles.categorie_id = $id", __CLASS__);
      }
  }



 ?>
