<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="index.php">Accueil Du site</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="templates/template_bootstrap/about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=post_article">Poster article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=profil"><?=$_SESSION['pseudo']?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=deconnect">Deconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
