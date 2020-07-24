<?php
/*
    ./app/controleurs/postsControleur.php
    Contrôleur des posts
 */

namespace App\Controleurs\Posts;
use \App\Modeles\Post;

  function indexAction(\PDO $connexion){
    // Je demande la liste de sposts au modèle
      include_once '../app/modeles/postsModele.php';
      $posts = Post\findAll($connexion);

    // Je charge la vue index dans $content1
      GLOBAL $content1, $title;
      $title = "Gestion des posts";
      ob_start();
       include '../app/vues/posts/index.php';
      $content1 = ob_get_clean();
  }

  function addFormAction(\PDO $connexion){
    // Je demande la liste des auteurs
    // au modèle auteurs
      include_once '../app/modeles/auteursModele.php';
      $auteurs = \App\Modeles\Auteur\findAll($connexion);

    // Je demande la liste des catégories
    // au modèle categories
      include_once '../app/modeles/categoriesModele.php';
      $categories = \App\Modeles\Categorie\findAll($connexion);

    // Je charge la vue addForm dans $content1
    GLOBAL $content1, $title;
    $title = "Ajout d'un post";
    ob_start();
     include '../app/vues/posts/addForm.php';
    $content1 = ob_get_clean();
  }

  function addAction(\PDO $connexion, array $data = null){
      // Je demande au modèle d'ajouter le post
        include_once '../app/modeles/postsModele.php';
        $id = Post\insert($connexion, $data);

      // J'ajoute les catégories éventuelles
        foreach ($data['categories'] as $categorie) {
          $return = Post\insertCategorie($connexion, $id, $categorie);
        }

      // Je redirige vers la liste des posts
        header('location: '. ROOT .'posts');
  }

  function deleteAction(\PDO $connexion, int $id = null){
      // Je demande au modèle de virer toutes les liaisons
      // Puis seulement je peux virer le post
        include_once '../app/modeles/postsModele.php';
        $return1 = Post\deleteCategoriesByPostId($connexion, $id);
        $return2 = Post\deleteById($connexion, $id);

      // Je redirige vers la liste des posts
        header('location: '. ROOT .'posts');
  }
