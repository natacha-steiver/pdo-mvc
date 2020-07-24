<?php
/*
    ./app/modeles/categoriesModele.php
    Modèle des catégorie
 */
    namespace App\Modeles\Categorie;

    function findAll(\PDO $connexion){
      $sql = "SELECT *
              FROM categories
              ORDER BY titre ASC;";
      $rs = $connexion->query($sql);
      return $rs->fetchAll(\PDO::FETCH_ASSOC);
    }

    function findOneById(\PDO $connexion, int $id){
      $sql = "SELECT *
              FROM categories
              WHERE id = :id;";
      $rs = $connexion->prepare($sql);
      $rs->bindValue(':id', $id, \PDO::PARAM_INT);
      $rs->execute();
      return $rs->fetch(\PDO::FETCH_ASSOC);
    }
