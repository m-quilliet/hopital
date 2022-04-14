<?php
require_once(dirname(__FILE__).'/../config/config.php');

$error=intval (filter_input(INPUT_GET,'error',FILTER_SANITIZE_NUMBER_INT));//creerr varianbe $error pr recupere j'utilis filter inmput puis méthod d'envoye de la donnée
//puis quelle est la donnée à récuoérer, le name du chp de formulaire ,pui filtre de nettoyage, ici un entier
//intval qd c'est un entier ou trim pr chaine de caractére ou enlever les espaces avant ou apres
//$errror vaudra valeur numerique là
//selon ce que vaut erreur on fait un switch 


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/error.php');
include(dirname(__FILE__).'/../views/templates/footer.php');