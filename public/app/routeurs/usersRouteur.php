<?php
/*
    ./app/routeurs/usersRouteur.php
    Routeur des users
 */

include_once '../app/controleurs/usersControleur.php';

switch ($_GET['users']):
  case 'login':
    // LOGIN
    // PATTERN: /?users=login
    // CTRL: usersControleur
    // ACTION: loginForm
    App\Controleurs\Users\loginFormAction();
    break;

  case 'submit':
    // SUBMIT
    // PATTERN: /?users=submit
    // CTRL: usersControleur
    // ACTION: loginSubmit
    App\Controleurs\Users\loginSubmitAction($connexion, [
      'login' => $_POST['login'],
      'pwd'   => $_POST['pwd']
    ]);
    break;
endswitch;
