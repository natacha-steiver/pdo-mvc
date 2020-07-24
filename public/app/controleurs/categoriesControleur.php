<?php
/*
    ./app/controleurs/categoriesControleur.php
    Contrôleur des categories
 */
    namespace App\Controleurs\Categories;
    use \App\Modeles\Categorie;

    function indexAction(\PDO $connexion){
      // Je demande la liste des catégories au modèle
        include_once '../app/modeles/categoriesModele.php';
        $categories = Categorie\findAll($connexion);

      // Je charge directement la vue index
          include '../app/vues/categories/index.php';
    }

    function showAction(\PDO $connexion, int $id){
      // Je demande les détails de la catégorie au modèle
        include_once '../app/modeles/categoriesModele.php';
        $categorie = Categorie\findOneById($connexion, $id);

      // Je demande les détails de la catégorie au modèle
        include_once '../app/modeles/postsModele.php';
        $posts = \App\Modeles\Post\findAllByCategorie($connexion, $id);

      // Je charge la vue show dans $content1
        GLOBAL $content1, $title;
        $title = $categorie['titre'];
        ob_start();
          include '../app/vues/categories/show.php';
        $content1 = ob_get_clean();
    }
