<?php
/*
    ./app/modeles/auteursModele.php
    Modèle des auteurs
 */
    namespace App\Modeles\Auteur;

    function findAll(\PDO $connexion){
      $sql = "SELECT *
              FROM auteurs
              ORDER BY pseudo ASC;";
      $rs = $connexion->query($sql);
      return $rs->fetchAll(\PDO::FETCH_ASSOC);
    }
