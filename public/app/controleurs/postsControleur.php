<?php
/*
    ./app/controleurs/postsControleur.php
    Contrôleur des posts
 */
    namespace App\Controleurs\Posts;
    use App\Modeles\Post;

    function indexAction(\PDO $connexion){
      // Je demande la liste des posts au modèle
        include_once '../app/modeles/postsModele.php';
        $posts = Post\findAll($connexion);

      // Je charge la vue dans $content1
        GLOBAL $content1, $title;
        $title = TITRE_DEFAUT;
        ob_start();
          include '../app/vues/posts/index.php';
        $content1 = ob_get_clean();
    }

    function showAction(\PDO $connexion, int $id = 1){
      // Je demande le post au modèle
      include_once '../app/modeles/postsModele.php';
      $post = Post\findOneById($connexion, $id);

      // Je charge la vue show dans $content1
      GLOBAL $content1, $title;
      $title = $post['titre'];
      ob_start();
        include '../app/vues/posts/show.php';
      $content1 = ob_get_clean();
    }

    function searchAction(\PDO $connexion, string $search){
      // Je demande les posts au modèle
      include_once '../app/modeles/postsModele.php';
      $posts = Post\findAllBySearch($connexion, $search);

      // Je charge la vue search dans $content1
      GLOBAL $content1, $title;
      $title = $search;
      ob_start();
        include '../app/vues/posts/search.php';
      $content1 = ob_get_clean();
    }
