<?php
  namespace app;
  use app\App;
  /**
   *
   */
  class Article
  {
      public $url;
      public static function getLast(){ // cette fonction nous permettera de récupérer les articles avec leur categorie
          return App::getDb()->query('SELECT * FROM articles LEFT JOIN categorie ON categorie.id = articles.categorie_id LEFT JOIN users ON users.id_user = articles.users_id', __CLASS__);
      }
      public function __get($get){
        $method = 'get' . ucfirst($get);
        $this->$get = $this->$method();
        return $this->$get;
      }


    public function getUrl(){
      $this->url = 'index.php?p=single&id=' . $this->id_article;
      return $this->url ;  }
      public function setUrl($url){
        $this->url = $url;
        return $this ;  }

      public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 150) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;

       }
       public static function getSingleArticle($id_article){
         return app::getDb()->prepare('SELECT * FROM articles LEFT JOIN categorie ON categorie.id = articles.categorie_id LEFT JOIN users ON users.id_user = articles.users_id WHERE articles.id_article = ? ',[$id_article], __CLASS__, true);
       }


       public static function insert_article($titre,$contenu,$categorie,$id_user){
         if (is_null($titre) || is_null($contenu) || is_null($categorie)) {
           echo ' <script type="text/javascript">alert("Champs Manquants!")
                </script>';
         }
         else {
           $titreSecure = trim(strip_tags($titre)); // on securise nos éléments
           $contenuSecure = trim(strip_tags($contenu));
           $categorieSecure = trim(strip_tags($categorie));
           $req = app::getDb()->getPdo(); // on recupere la connexion à notre base de donnée
           $result = $req->prepare("INSERT INTO articles (titre, contenu, categorie_id, users_id) VALUES (:titre, :contenu, :categorie_id, $id_user)");
           $result->bindParam(':titre', $titreSecure);
           $result->bindParam(':contenu', $contenuSecure);
           $result->bindParam(':categorie_id', $categorieSecure);
           $result->execute();
           $nombre = $result->RowCount();
           if ($nombre < 1 ) {
             echo ' <script type="text/javascript">alert("Erreur lors de l\'enregistrement de votre article)
                  </script>';
           }
           else {
             echo' <script type="text/javascript">alert("votre article a été posté  !")
                  </script>';
                header("Location: index.php");
         }
       }
      }

      public static function updateArticle($id_article){
          if ((isset($_POST['titre'])) || (isset($_POST['categorie'])) || (isset($_POST['message']))) {
            if ((is_null($_POST['titre'])) || (is_null($_POST['categorie'])) || (is_null($_POST['message']))) {
              echo "Un ou plusieurs champs ne sont pas renseignées.";
            }
            else {
              $titre = trim(strip_tags($_POST['titre']));
              $contenu = trim(strip_tags($_POST['message']));
              $categorie_id = trim(strip_tags($_POST['categorie']));
              $req = app::getDb()->getPdo();
              $result = $req->prepare("UPDATE articles SET titre = :titre, contenu = :contenu, categorie_id = :categorie_id  WHERE id_article = $id_article");
              $result->bindParam(':titre', $titre);
              $result->bindParam(':contenu', $contenu);
              $result->bindParam(':categorie_id', $categorie_id);
              $result->execute();
              $nombre = $result->RowCount();
              if ($nombre < 1 ) {
                echo 'erreur modification';
              }
              else {
                   header("Location:admin.php?p=articles/edit&id=<?=$id_article?>");
                 }
               }
             }
           }
    public function deleteArticle($id_article){
      $req = app::getDb()->getPdo();
      $result = $req->prepare("DELETE FROM articles WHERE id_article = :id_article");
      $result->bindParam(':id_article', $id_article);
      $result->execute();
      $nombre = $result->RowCount();
      if ($nombre < 1 ) {
        echo 'suppression impossible';
      }
      else {
           header("Location:admin.php?p=articles/index");
         }



    }
         }
 ?>
