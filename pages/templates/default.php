<?php
if (isset($_SESSION['pseudo']) && !(empty($_SESSION['pseudo']))) {
  $verifAdmin = app\Users::is_admin($_SESSION['id_user']);
  if ($verifAdmin) {
    ob_start();
    include_once '../pages/inc/nav_admin.inc.php';
    $nav = ob_get_clean();
  }
  else {
    ob_start();
    include_once '../pages/inc/nav_connect.inc.php';
    $nav = ob_get_clean();
  }
}
else {
  ob_start();
  include_once '../pages/inc/nav_visiteur.inc.php';
  $nav = ob_get_clean();
}
 ?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site Article POO</title>

    <!-- Bootstrap core CSS -->
    <link href="templates/template_bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="templates/template_bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="templates/template_bootstrap/css/clean-blog.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body><?=$nav?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('templates/template_bootstrap/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Exemple d'article</h1>
              <span class="subheading">Exemple de site d'article POO</span>
              <small><span class="subheading">Copyright Yassine Zakari</span></small>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?=$content;?>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright yassine zakari <?=date("Y");?></p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="templates/template_bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="templates/template_bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="templates/template_bootstrap/js/clean-blog.min.js"></script>

    <!-- personnel script -->
    <script type="text/javascript" src="js/style.js"></script>
     
    </body>

    </html>
