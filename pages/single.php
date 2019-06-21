
<?php
session_start();
use app\Article;

  $id = intval($_GET['id']); // on convertie en integer afin que de sécuriser notre requête et eviter l'injection
  if ($id > 0) {
    $dataSingle = Article::getSingleArticle($id);
  }
  else  {
    header('Location: index.php?p=home');
    die;
  }

 ?>
 <!-- Post Content -->

 <article>
   <div class="container">
     <div class="row">
       <div class="col-lg-8 col-md-10 mx-auto">
         <h2 class="post-heading"><?=$dataSingle->titre?></h2>
         <p><?=$dataSingle->contenu?></p>
         <p class="post-meta">Posté par
           <a href="index.php?p=user&id=<?=$dataSingle->id_user?>"><?=$dataSingle->user_name?></a>
           <?=$dataSingle->date_enregistrement?><br><a href='index.php?p=categorie&id=<?=$dataSingle->id?>'><?=ucfirst($dataSingle->titre_categorie)?></a></p>
       </div>
     </div>
   </div>
 </article>

 <hr>
