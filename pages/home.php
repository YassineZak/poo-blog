
<?php
session_start();
 foreach ( article::getLast() as $data):
   $data->getUrl()?>
  <!-- Main Content -->

  <div class="container">
    <div class="row">
      <div class="mx-auto">
        <div class="post-preview">
          <a href="<?=$data->url?>">
            <h2 class="post-title">
            <?=$data->titre?>
            </h2>
            <h3 class="post-subtitle">
              <?=$data->extrait; ?>
            </h3>
          </a>
          <p class="post-meta">Posté par
            <a href="index.php?p=user&id=<?=$data->id_user?>"><?=$data->user_name?></a>
            <?=$data->date_enregistrement?><br><a href='index.php?p=categorie&id=<?=$data->id?>'><?=ucfirst($data->titre_categorie)?></a></p>
        </div>
        <hr>
<?php endforeach;?>


<!-- Pager -->
<div class="clearfix">
  <a class="btn btn-primary float-right" href="#">Anciens posts &rarr;</a>
      </div>
    </div>
  </div>
</div>

<hr>
