<?php
session_start();
if (is_null($_SESSION['id_user'])) {
  header("Location: index.php");
}
if (isset($_POST['titre'])){

  app\Article::insert_article($_POST['titre'],$_POST['message'],$_POST['categorie'],$_SESSION['id_user']);
} ?>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
<form id="contactForm" method="post" novalidate>
  <div class="control-group">
    <div class="form-group floating-label-form-group controls">
      <label>Titre de l'article</label>
      <input type="text" class="form-control" name="titre" placeholder="Titre de l'article">
      <p class="help-block text-danger"></p>
    </div>
  </div>
  <div class="control-group">
    <div class="form-group col-xs-12 floating-label-form-group controls">
      <label for="categorie">Categorie</label>
      <select id="categorie" name="categorie" class="form-control" required>
      <option value= 1>Sport</option>
      <option value= 3>Hi-tech</option>
      <option value= 2>actualités</option>
      <option value= 4>politiques</option>
      <option value= 5>divers</option>
      </select>
      <p class="help-block text-danger"></p>
    </div>
  </div>
  <div class="control-group">
    <div class="form-group floating-label-form-group controls">
      <label>Message</label>
      <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez saisir le contenu de l'article."></textarea>
      <p class="help-block text-danger"></p>
    </div>
  </div>
  <br>
  <div id="success"></div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary" id="sendMessageButton">Poster</button>
  </div>
</form>
</div>
</div>
</div>
<hr>
