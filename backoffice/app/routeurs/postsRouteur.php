<?php
  /*
      ./app/routeurs/postsRouteur.php
   */
  use \App\Controleurs\Posts;
  include_once '../app/controleurs/postsControleur.php';

  switch ($_GET['posts']):

    case 'index':
      // LISTE DES POSTS
      // PATTERN: ?posts=index
      // CTRL: postsControleur
      // ACTION: index
      Posts\indexAction($connexion);
      break;

    case 'addForm':
      // AJOUT D'UN POST - FOMULAIRE
      // PATTERN: ?posts=addForm
      // CTRL: postsControleur
      // ACTION: addForm
      Posts\addFormAction($connexion);
      break;

    case 'add':
      // AJOUT D'UN POST - INSERT
      // PATTERN: ?posts=add
      // CTRL: postsControleur
      // ACTION: add
      Posts\addAction($connexion, [
        'titre'      => $_POST['titre'],
        'texte'      => $_POST['texte'],
        'auteur'     => $_POST['auteur'],
        'categories' => (isset($_POST['categories']))?$_POST['categories']:[]
      ]);
      break;

      case 'delete':
        // SUPPRESSION D'UN POST
        // PATTERN: ?posts=delete&id=x
        // CTRL: postsControleur
        // ACTION: delete
        Posts\deleteAction($connexion, $_GET['id']);
        break;
  endswitch;
