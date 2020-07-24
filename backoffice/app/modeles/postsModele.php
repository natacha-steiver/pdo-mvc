<?php
/*
    ./app/modeles/postsModele.php
    Modèle des posts
 */
    namespace App\Modeles\Post;

    function findAll(\PDO $connexion){
      $sql = "SELECT *,
                     posts.titre AS postTitre,
                     posts.slug AS postSlug,
                     posts.id AS postId
              FROM posts
              JOIN auteurs ON auteurs.id = posts.auteur
              ORDER BY datePublication DESC;";
      $rs = $connexion->query($sql);
      return $rs->fetchAll(\PDO::FETCH_ASSOC);
    }

    function findOneById(\PDO $connexion, int $id){
      $sql = "SELECT * , posts.id as postId
              FROM posts
              JOIN auteurs ON posts.auteur = auteurs.id
              WHERE posts.id = :id;";
      $rs = $connexion->prepare($sql);
      $rs->bindValue(':id',$id,\PDO::PARAM_INT);
      $rs->execute();
      return $rs->fetch(\PDO::FETCH_ASSOC);
    }

    function insert(\PDO $connexion, array $data = null){
      $sql = "INSERT INTO posts
              SET titre  = :titre,
                  slug   = :slug,
                  texte  = :texte,
                  auteur = :auteur,
                  datePublication = NOW();";
      $rs = $connexion->prepare($sql);
      $rs->bindValue(':titre', $data['titre'], \PDO::PARAM_STR);
      $rs->bindValue(':slug',  \Noyau\Fonctions\slugify($data['titre']), \PDO::PARAM_STR);
      $rs->bindValue(':texte', $data['texte'], \PDO::PARAM_STR);
      $rs->bindValue(':auteur', $data['auteur'], \PDO::PARAM_INT);
      $rs->execute();
      return intval($connexion->lastInsertId());
      /*
        $id = $connexion->lastInsertId();
        foreach ($data['categories'] as $categorie) {
          $return = insertCategorie($connexion, $id, $categorie);
        }
        return intval($id);
      */
    }

    function insertCategorie(\PDO $connexion, int $post, int $categorie){
      $sql = "INSERT INTO posts_has_categories
              SET post = :post,
                  categorie = :categorie;";
      $rs = $connexion->prepare($sql);
      $rs->bindValue(':post', $post, \PDO::PARAM_INT);
      $rs->bindValue(':categorie', $categorie, \PDO::PARAM_INT);
      return intval($rs->execute());
    }

    function deleteCategoriesByPostId(\PDO $connexion, int $post){
      $sql = "DELETE FROM posts_has_categories
              WHERE post = :post;";
      $rs = $connexion->prepare($sql);
      $rs->bindValue(':post', $post, \PDO::PARAM_INT);
      return intval($rs->execute());
    }

    function deleteById(\PDO $connexion, int $id){
      // deleteCategoriesByPostId($id);
      $sql = "DELETE FROM posts
              WHERE id = :id;";
      $rs = $connexion->prepare($sql);
      $rs->bindValue(':id', $id, \PDO::PARAM_INT);
      return intval($rs->execute());
    }
