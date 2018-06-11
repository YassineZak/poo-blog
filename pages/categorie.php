
<?php
session_start();
$id = intval($_GET['id']); // on convertie en integer afin que de sécuriser notre requête et eviter l'injection
if ($id > 0) {
categorie::getArticleByCategorie($id);

}
else  {
  header('Location: index.php?p=home');
  die;
}
foreach ( categorie::getArticleByCategorie($id) as $articleCat):?>
  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="mx-auto">
        <div class="post-preview">
          <a href="href='index.php?p=single&id=<?=$articleCat->id?>'">
            <h2 class="post-title">
            <?=$articleCat->titre?>
            </h2>
            <h3 class="post-subtitle">
              <?=$articleCat->extrait; ?>
            </h3>
          </a>
          <p class="post-meta">Posté par
            <a href="#">Zakari Yassine</a>
            <?=$articleCat->date_enregistrement?><br><a href='index.php?p=categorie&id=<?=$articleCat->id?>'><?=ucfirst($articleCat->titre_categorie)?></a></p>
        </div>
        <hr>
        <?php endforeach;?>
