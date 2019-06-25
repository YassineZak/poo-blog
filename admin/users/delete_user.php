<?php
session_start();
if (isset ($_SESSION['id_user'])) {
    $verifAdmin = app\Users::is_admin($_SESSION['id_user']);
    if (!$verifAdmin) {
      header('Location: index.php');
    }
}
else {
  header('Location: index.php');
}
$id = intval($_GET['id']); // on convertie en integer afin que de sécuriser notre requête et eviter l'injection
if ($id > 0) {
  $user = New app\Users;
  $user->deleteUser($id);
  header('Location: admin.php?p=users/index');
}
else {
  header('Location: index.php');
}
