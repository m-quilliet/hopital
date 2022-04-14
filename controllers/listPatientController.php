<?php

//on appelle le modele 
require_once(dirname(__FILE__).'/../models/Patient.php');

$patient = new Patient(); //intencier 
$listPatients=$patient->listPatient();



//-Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
//-ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/listPatient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');