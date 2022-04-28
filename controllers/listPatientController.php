<?php

//on appelle le modele 
require_once(dirname(__FILE__).'/../models/Patient.php');

$styleList='listPatient.css';

$patients = Patient::listPatient(); //car c'est une méthode static(::) (met le nom de la méthode)
if(isset($_POST ['search'])){
    $search=trim(filter_input(INPUT_POST,'search', FILTER_SANITIZE_SPECIAL_CHARS));
    $patients = Patient::listPatient($search); //car c'est une méthode static(::) (met le nom de la méthode)
}






//-Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
//-ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/listPatient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');