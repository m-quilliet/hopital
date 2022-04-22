<?php

//on appelle le modele 
require_once(dirname(__FILE__).'/../models/Appointment.php');

$styleList='listPatient.css';

$listAppointment = Appointment::listAppointment(); //car c'est une méthode static(::) (met le nom de la méthode)




//-Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
//-ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/listAppointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');