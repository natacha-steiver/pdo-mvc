<?php
/*
    ./app/controleurs/usersControleur.php
    Contrôleur des users
 */
    namespace App\Controleurs\Users;
    use \App\Modeles\User;

    function loginFormAction(){
      // Je charge la vue dans $content1
        GLOBAL $content1, $title;
        $title = TITRE_LOGIN;
        ob_start();
          include '../app/vues/users/loginForm.php';
        $content1 = ob_get_clean();
    }

    function loginSubmitAction(\PDO $connexion, array $data = null){
      // Je demande au modèle le user qui correspond au login et pwd
        include_once '../app/modeles/usersModele.php';
        $user = User\findOneByLoginPwd($connexion, $data);

      // Si il y a un user
      // alors je redirige vers le dashbord du backoffice
        if ($user):
          // Je lui met un badge
          $_SESSION['user'] = $user;
          // Je redirige vers le backoffice
          header('location: ' . ROOT_ADMIN);

      // Sinon, on redirige vers le login
        else:
          header('location: ' . ROOT . 'users/login');
        endif;
    }
