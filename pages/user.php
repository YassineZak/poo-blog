
<?php
session_start();
$id = intval($_GET['id']); // on convertie en integer afin que de sécuriser notre requête et eviter l'injection
if ($id > 0) {
  app\Users::getArticleByuser($id);
}
else  {
  header('Location: index.php?p=home');
  die;
}
foreach ( app\Users::getArticleByuser($id) as $articleUser):?>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="mx-auto">
        <div class="post-preview">
          <a href="<?=$articleUser->url?>">
            <h2 class="post-title">
            <?=$articleUser->titre?>
            </h2>
            <h3 class="post-subtitle">
              <?=$articleUser->extrait; ?>
            </h3>
          </a>
          <p class="post-meta">Posté par
            <a href="#"><?=$articleUser->user_name?></a>
            <?=$articleUser->date_enregistrement?><br><a href='index.php?p=categorie&id=<?=$articleUser->id?>'><?=ucfirst($articleUser->titre_categorie)?></a></p>
        </div>
        <hr>
<?php endforeach; ?>
