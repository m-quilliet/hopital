<?php
$profilPatient='profilPatient.css';
//on appelle le modele 
require_once(dirname(__FILE__).'/../models/Patient.php');
$id = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

$idProfil = Patient::profilPatient($id); //car c'est une méthode static(::) (met le nom de la méthode)

if($idProfil instanceof PDOException){
    $errorMessage= $idProfil->getMessage();
}




//-Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
//-ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/profilPatient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');