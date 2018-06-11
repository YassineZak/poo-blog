<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand" href="index.php">Acceuil Du site</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Acceuil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=post_article">Poster article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=profil"><?=$_SESSION['pseudo']?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php?p=articles/index">Gestion Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php?p=users/index">Gestion membres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=deconnect">Deconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
