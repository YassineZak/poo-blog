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
    }?>
    <h2 class="admin col-md-5 offset-4">Administration des Membres</h2>
    <div class="col-md-11 offset-1 table-responsive">
      <?php
      $test = new app\Table;
      $test->tableau(array('membre', 'date inscription', 'statut', 'action'));
      foreach ( app\Users::getAllUsers() as $data):?>
      <tr>
      <td class="col-md-2"><?=$data->user_name?></td>
      <td class="col-md-2"><?=$data->date_inscription?></td>
      <td class="extrait col-md-2 " ><a class="delete" href="admin.php?p=users/define_statut&id=<?=$data->id_user?>" ><?=app\Users::showAdmin($data->id_user);?></a></td>
      <td class="col-md-1"><a  class="delete" href="admin.php?p=users/delete_user&id=<?=$data->id_user?>"><button type="button" class="btn btn-danger" name="button">Supprimer</button></a></td>
    </tr>
  <?php endforeach;?>
      </table>
    </div>
    <hr>
