<?php
/*
    ./noyau/fonctions.php
    Fonctions personnalisées du framework
 */
namespace Noyau\Fonctions;

 function slugify(string $str) {
	    return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($str)), '-');
	}
