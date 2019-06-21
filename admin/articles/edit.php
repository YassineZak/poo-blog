<?php
    session_start();
    dump('test');
    if (isset ($_SESSION['id_user'])) {
        $verifAdmin = app\Users::is_admin($_SESSION['id_user']);
        if (!$verifAdmin) {
          header('Location: ../public/index.php');
        }
    }
    else {
      header('Location: ../public/index.php');
    }

    $id = intval($_GET['id']); // on convertie en integer afin que de sécuriser notre requête et eviter l'injection
    if ($id > 0) {
      dump($id);
      $dataSingle = app\Article::getSingleArticle($id); // on recupérer l'ensemble des informations de l'article pour pré remplir notre formulaire d'edition
      $updateSingle = app\Article::updateArticle($id);
    }
    else  {
      dump('stop');
      header('Location: index.php?p=home');
      die;
    }

  ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
  <form id="contactForm" method="post" novalidate>
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>Titre de l'article</label>
        <input type="text" class="form-control" name="titre" placeholder="Titre de l'article" value="<?=$dataSingle->titre?>">
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
      <div class="form-group col-xs-12 floating-label-form-group controls">
        <label for="categorie">Categorie</label>
        <select id="categorie" name="categorie" class="form-control" required>
        <option value= 1 <?php if($dataSingle->id == 1){echo "selected";}?>>Sport</option>
        <option value= 3 <?php if($dataSingle->id == 3){echo "selected";}?>>Hi-tech</option>
        <option value= 2 <?php if($dataSingle->id == 2){echo "selected";}?>>actualités</option>
        <option value= 4 <?php if($dataSingle->id == 4){echo "selected";}?>>politiques</option>
        <option value= 5 <?php if($dataSingle->id == 5){echo "selected";}?>>divers</option>
        </select>
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <div class="control-group">
      <div class="form-group floating-label-form-group controls">
        <label>Message</label>
        <textarea rows="5" name="message" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez saisir le contenu de l'article."><?=$dataSingle->contenu?></textarea>
        <p class="help-block text-danger"></p>
      </div>
    </div>
    <br>
    <div id="success"></div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" id="sendMessageButton">Editer</button>
    </div>
  </form>
  </div>
  </div>
  </div>
  <hr>
