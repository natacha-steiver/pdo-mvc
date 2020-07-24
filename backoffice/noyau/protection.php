<?php
/*
    ./noyau/protection.php
    Fichier de protection
 */

 if(!isset($_SESSION['user'])):
   header('location: ' . ROOT_PUBLIC . 'users/login');
 endif;
