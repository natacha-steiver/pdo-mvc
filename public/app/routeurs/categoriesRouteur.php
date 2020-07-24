<?php

include_once '../app/controleurs/categoriesControleur.php';

switch($_GET['categories']):
  case 'show':
     // DETAILS D'UNE CATEGORIE
     // PATTERN: /?categorieId=x
     // CTRL: categoriesControleur
     // ACTION: show
     include_once '../app/controleurs/categoriesControleur.php';
     App\Controleurs\Categories\showAction($connexion, $_GET['id']);
     break;
endswitch;
