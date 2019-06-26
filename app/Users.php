<?php
    namespace app;
    use app\App;
  /**
   *
   */
  class Users
  {
    public static function deconnexion(){
      // Initialiser la sesssion
      session_start();

      // Vider la session
      $_SESSION = array();

      // Supprimer le cookie PHPSESSID
      if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();

          setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
          );
      }

      // Finalement, on détruit la session.
      session_destroy();

      // Redirige vers la page de connexion
      header("Location: index.php?p=home");
      exit;

    }
    public static function connexion ($username, $password){
      $usernameSecure = trim(strip_tags($username));
      $passwordSecure = trim(strip_tags($password));
      $req = App::getDb()->getPdo();
      $result = $req->prepare("SELECT * FROM users WHERE user_name = :username AND user_passe = :password");// on recupere la connexion à notre base de donnée
      $result->bindParam(':username', $usernameSecure);
      $result->bindParam(':password', $passwordSecure);
      $result->execute();
      $nombre = $result->RowCount();
      $donnees = $result->fetchObject();
      if ($nombre < 1 ) {
        echo ' <script type="text/javascript">alert("Pseudo ou Mot de passe incorrect !")
             </script>';

      }
      else {
        echo ' <script type="text/javascript">alert("bonjour  ' . $username . ' !")
             </script>';
             session_start(); // on initialise la session afin que l'utilisateur reste connecté
                  $_SESSION['id_user'] = $donnees->id_user;
                  $_SESSION['pseudo'] = $donnees->user_name;
                  $_SESSION['date_inscription'] = $donnees->date_inscription;
                  header("Location: index.php");
      }
    }
    public static function is_admin($username){
      $req = App::getDb()->getPdo();
      $verifstatut = $req->query("SELECT statut FROM users WHERE id_user = $username");
      $result = $verifstatut->fetchObject();
      if ($result->statut == 1) {
         return true;
      }
      else {
        return false;
      }
    }

    public static function inscription ($username, $password){ // on crée un fonction inscrfiption pour les membres
      if (is_null($username) || is_null($password)) {  // on verifie que nos deux parametres ne sont pas vides
        echo ' <script type="text/javascript">alert("Les deux champs Mot de passe et pseudo doivent être renseignés !")
             </script>';
      }
      else{

      $usernameSecure = trim(strip_tags($username)); // on securise nos éléments
      $passwordSecure = trim(strip_tags($password));
      $req = App::getDb()->getPdo(); // on recupere la connexion à notre base de donnée
      $verifUser = $req->query("SELECT user_name FROM users WHERE user_name = '$usernameSecure'"); // on verifie dans notre base de données si le pseudo n'as pas déja été crée auparavant
      $occurence = $verifUser->RowCount();
      if ($occurence > 0 ) {
        echo '<script type="text/javascript">alert("pseudo existant !")
             </script>';
      }
      else{
      $result = $req->prepare("INSERT INTO users (user_name, user_passe, statut) VALUES (:username, :password, 0)"); // on sécurise à l'aide d'une requete préparé
      $result->bindParam(':username', $usernameSecure);
      $result->bindParam(':password', $passwordSecure);
      $result->execute();
      $nombre = $result->RowCount();
      if ($nombre < 1 ) {
        echo ' <script type="text/javascript">alert("Format Incorrect !")
             </script>';
      }
      else {
        echo' <script type="text/javascript">alert("enregistrement effectué !")
             </script>';
             $result = $req->query("SELECT * FROM users WHERE id_user = LAST_INSERT_ID()");
             $donnees = $result->fetchObject();
            session_start(); // on initialise la session afin que l'utilisateur reste connecté
            $_SESSION['id_user'] = $donnees->id_user;
            $_SESSION['pseudo'] = $donnees->user_name;
            $_SESSION['date_inscription'] = $donnees->date_inscription;
            header("Location: index.php");
            }
        }
      }
    }
    public static function getArticleByuser($id){ // cette fonction nous permettera de récupérer les articles avec leur categorie
        return App::getDb()->query("SELECT * FROM articles LEFT JOIN categorie ON categorie.id = articles.categorie_id LEFT JOIN users ON users.id_user = articles.users_id WHERE articles.users_id = $id", __CLASS__);
      }

    public function __get($get){
      $method = 'get' . ucfirst($get);
      $this->$get = $this->$method();
      return $this->$get;}


  public function getUrl(){
    return 'index.php?p=single&id=' . $this->id_article;    }

    public function getExtrait(){
      $html = '<p>' . substr($this->contenu, 0, 250) . '...</p>';
      $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
      return $html;

      }
  public static function getAllUsers(){
    return App::getDb()->query("SELECT * FROM users", __CLASS__);
    }
  public static function showAdmin($id_user){
    if (self::is_admin($id_user)) {
      echo'<button type="button" data-toggle="modal" data-target="#myModal" class="btn-confirm btn btn-primary" name="button">admin</button>';
    }
    else {
      echo'<button type="button" data-toggle="modal" data-target="#myModal" class="btn-confirm btn btn-secondary"name="button">admin</button>';
    }
  }
  public static function changeAdminStat($id_user){
    if (self::is_admin($id_user)) {
      $req = App::getDb()->getPdo();
      $req->query("UPDATE users SET statut = 0 WHERE id_user = $id_user");
    }
    else {
      $req = App::getDb()->getPdo();
      $req->query("UPDATE users SET statut = 1 WHERE id_user = $id_user");
    }
  }
  
  public function deleteUser($id){
    $req = App:: getDb()->getPdo();
    $result = $req->prepare("DELETE from users WHERE id_user = :id");
    $result->bindParam(':id', $id);
    $result->execute();
    }

  }
 ?>
