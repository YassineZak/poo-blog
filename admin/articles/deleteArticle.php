<?php
session_start();
if (isset ($_SESSION['id_user'])) {
    $verifAdmin = users::is_admin($_SESSION['id_user']);
    if (!$verifAdmin) {
      header('Location: ../public/index.php');
    }
}
else {
  header('Location: ../public/index.php');
}

$id = intval($_GET['id']); // on convertie en integer afin que de sécuriser notre requête et eviter l'injection
if ($id > 0) {
  $dataSingle = article::deleteArticle($id);
}
else {
  header('Location: ../public/index.php');
}


 ?>
