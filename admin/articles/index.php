
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
    }   ?>
    <h2 class="admin col-md-5 offset-4">Administration des articles</h2>
    <div class="col-md-11 offset-1 table-responsive">
        <?php
        $test = new app\Table;
        $test->tableau(array('Titre', 'Auteur', 'Extrait'));
        foreach ( app\Article::getLast() as $data):?>
        <tr>
        <td class="col-md-2"><?=$data->titre?></td>
        <td class="col-md-2"><?=$data->user_name?></td>
        <td class="extrait col-md-5"><?=$data->extrait?></td>
        <td class="col-md-1"><a href="admin.php?p=articles/edit&id=<?=$data->id_article?>"><button type="button" class="btn btn-primary"name="button">Editer</button></a></td>
        <td class="col-md-1"><a href="admin.php?p=articles/deleteArticle&id=<?=$data->id_article?>"><button type="button" class="btn btn-danger"name="button">Supprimer</button></a></td>
      </tr>
        <?php endforeach;?>
      </table>
    </div>
    <hr>
