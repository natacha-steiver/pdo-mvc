<?php
/*
    ./app/controleurs/usersControleur.php
    Contrôleur des users
 */

namespace App\Controleurs\Users;
//use \App\Modeles\Xxx;

  function dashboardAction(){
    // Je charge la vue dashboard dans $content1
      GLOBAL $content1, $title;
      $title = "Dashboard";
      ob_start();
       include '../app/vues/users/dashboard.php';
      $content1 = ob_get_clean();
  }
