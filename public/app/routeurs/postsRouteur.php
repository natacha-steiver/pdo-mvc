<?php

include_once '../app/controleurs/postsControleur.php';

switch($_GET['posts']):
  case 'search':
    // RECHERCHE
    // PATTERN: /?search=posts
    // CTRL: postsControleur
    // ACTION: search
    include_once '../app/controleurs/postsControleur.php';
    App\Controleurs\Posts\searchAction($connexion, $_POST['search']);
    break;
  case 'show':
    // DETAILS D'UN POST
    // PATTERN: /?postId=x
    // CTRL: postsControleur
    // ACTION: show
    include_once '../app/controleurs/postsControleur.php';
    App\Controleurs\Posts\showAction($connexion, $_GET['id']);
    break;
endswitch;
