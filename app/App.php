<?php
namespace app;
use app\Database;

/**
 *
 */
class App
{
  const DB_NAME = 'blog';// je stock dans des constantes les informations de connexion a ma bdd, ainsi a chaque fois que j'ai besoin de me connecter je n'aurai qu'a les modifier ici
  const DB_USER = 'root';
  const DB_PASS = 'root';
  const DB_HOST = 'localhost';

  private static $database; // cette variable statique va nous permettre de sauvegarder la connexion à la base de données
  public static function getDb(){ // cette fonction initialisera la connexion à la bdd
    if (self::$database === null ) { // on verifie si self::$database n'a pas été défini auparavant cela nous evite de le redéfinir à chaque fois
      self::$database = new database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST); // on sauvegarde dans notre variable statique notre object qui nous permet de nous conneecter à la bdd // on le sauvegarde dans une variable statique car sa portée est importante et on peut l'appeler de n'importe ou
      return self::$database ;
    }
    else {
    return self::$database ;
    }
  }
}


 ?>
