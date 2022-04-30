<?php

//on appelle le modele 
require_once(dirname(__FILE__).'/../models/Patient.php');


$styleList='listPatient.css';


$listPatients = Patient::listPatients(); //car c'est une méthode static(::) (met le nom de la méthode)
if(isset($_POST ['search'])){
    $search=trim(filter_input(INPUT_POST,'search', FILTER_SANITIZE_SPECIAL_CHARS));//recupére input search de notre formulaire
    //
    $listPatients = Patient::listPatients($search); //car c'est une méthode static(::) (met le nom de la méthode)
}

if (isset ($_GET['page'])) {
    $currentPage = intVal(trim(filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS)));
}else{
    $currentPage = 1;
}
$search = trim(filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS));


$nbPatients = Patient::count();
$patientsPerPage = 10;
$nbPages = ceil($nbPatients->nb_patients/$patientsPerPage);
$offset = ($currentPage - 1) * $patientsPerPage;

$listPatients = Patient::listPatients($search,$patientsPerPage,$offset);



//-Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
//-ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/listPatient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');