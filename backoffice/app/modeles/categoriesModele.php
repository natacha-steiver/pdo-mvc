<?php
/*
    ./app/modeles/categoriesModele.php
    Modèle des catégories
 */
    namespace App\Modeles\Categorie;

    function findAll(\PDO $connexion){
      $sql = "SELECT *
              FROM categories
              ORDER BY titre ASC;";
      $rs = $connexion->query($sql);
      return $rs->fetchAll(\PDO::FETCH_ASSOC);
    }
