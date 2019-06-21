<?php
    namespace app;
  /**
   *
   */
  class Table
  {
    public function tableau($th = array()){
          $tab = '<table class="table">';
          $tab .= '<thead>';
          $tab .= '<tr>';
          foreach ($th as $key):
            $tab .=  '<th>'  . $key . '</th>';
          endforeach;
          $tab .= '</tr>';
          $tab .= '</thead>';
          $tab .= '</tbody>';


          echo $tab;
        }
      }





 ?>
