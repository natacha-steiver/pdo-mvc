<?php
/*
    ./app/routeur.php
    Routeur principal
    Il décide quelle action de quel contrôleur il faut lancer
 */

    // ROUTES DES POSTS
    if (isset($_GET['posts'])):
      include_once '../app/routeurs/postsRouteur.php';

    else:
      // ROUTE PAR DEFAUT
      // PATTERN: /
      // CTRL: usersControleur
      // ACTION: dashboard
        include_once '../app/controleurs/usersControleur.php';
        \App\Controleurs\Users\dashboardAction($connexion);
    endif;
