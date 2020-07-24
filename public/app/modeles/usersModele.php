<?php
/*
    ./app/modeles/usersModele.php
    Modèle des users
 */
    namespace App\Modeles\User;

    function findOneByLoginPwd(\PDO $connexion, array $data){
      $sql = "SELECT *
              FROM users
              WHERE login = :login
                AND pwd   = :pwd;";
      $rs = $connexion->prepare($sql);
      $rs->bindValue(':login', $data['login'], \PDO::PARAM_STR);
      $rs->bindValue(':pwd'  , $data['pwd']  , \PDO::PARAM_STR);
      $rs->execute();
      return $rs->fetch(\PDO::FETCH_ASSOC);
    }
