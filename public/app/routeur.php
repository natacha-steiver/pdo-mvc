<?php
/*
    ./app/routeur.php
    Routeur principal
    Il décide quelle action de quel contrôleur il faut lancer
 */

    if(isset($_GET['users'])):
      include_once '../app/routeurs/usersRouteur.php';

    elseif(isset($_GET['categories'])):
      include_once '../app/routeurs/categoriesRouteur.php';

    elseif (isset($_GET['posts'])):
      include_once '../app/routeurs/postsRouteur.php';

    else:
      // ROUTE PAR DEFAUT
      // PATTERN: /
      // CTRL: postsControleur
      // ACTION: index
        include_once '../app/controleurs/postsControleur.php';
        App\Controleurs\Posts\indexAction($connexion);
    endif;
