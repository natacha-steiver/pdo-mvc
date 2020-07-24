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

    function findAllByCategorie(\PDO $connexion, int $idCategorie){
      $sql = "SELECT *,
                     posts.titre AS postTitre,
                     posts.slug AS postSlug,
                     posts.id AS postId
              FROM posts
              JOIN auteurs ON auteurs.id = posts.auteur
              JOIN posts_has_categories ON post = posts.id
              WHERE categorie = :categorie
              ORDER BY datePublication DESC;";
      $rs = $connexion->prepare($sql);
      $rs->bindValue(':categorie', $idCategorie, \PDO::PARAM_INT);
      $rs->execute();
      return $rs->fetchAll(\PDO::FETCH_ASSOC);
    }

    function findAllBySearch(\PDO $connexion, string $search){
      $words = explode(' ', $search);
      $sql = "SELECT DISTINCT datePublication, pseudo, media, texte,
                     posts.titre AS postTitre,
                     posts.slug  AS postSlug,
                     posts.id    AS postId
              FROM posts
              JOIN auteurs ON auteurs.id = posts.auteur
              JOIN posts_has_categories ON post = posts.id
              JOIN categories ON categorie = categories.id
              WHERE 1 = 0 ";
        for($i=0; $i<count($words); $i++):
          $sql .= " OR LOWER(posts.titre)      LIKE LOWER(:search$i)
                    OR LOWER(posts.texte)      LIKE LOWER(:search$i)
                    OR LOWER(categories.titre) LIKE LOWER(:search$i)
                    OR LOWER(auteurs.pseudo)   LIKE LOWER(:search$i) ";
        endfor;
      $sql .= " ORDER BY datePublication DESC;";
      $rs = $connexion->prepare($sql);
      for($i=0; $i<count($words); $i++) :
        $rs->bindValue(":search$i", '%'.$words[$i].'%', \PDO::PARAM_STR);
      endfor;
      $rs->execute();
      return $rs->fetchAll(\PDO::FETCH_ASSOC);
    }
