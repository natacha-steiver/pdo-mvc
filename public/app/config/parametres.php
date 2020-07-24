<?php
/*
    ./app/config/parametres.php
    Paramètres de l'application
 */

// Constantes de connexion
  define('DBHOTE', '127.0.0.1:8889');
  define('DBNAME', 'material_blog');
  define('DBUSER', 'root');
  define('DBPWD' , 'root');
  define('PUBLIC_PATH', 'public');
  define('ADMIN_PATH' , 'backoffice');

// Zones dynamiques du template
  $content1 = '';
  $title    = '';

// Textes
  define('TITRE_DEFAUT' ,"Liste des posts");
  define('TITRE_LOGIN'  ,"Connexion au BackOffice");
