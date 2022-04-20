<?php
//depuis controllers comment je fais pr trouver mon fichier regex?
require_once(dirname(__FILE__) . '/../config/regex.php');
//on appelle le modele 
require_once(dirname(__FILE__) . '/../models/Patient.php');
require_once(dirname(__FILE__) . '/../models/Appointment.php');


$addAppointmentPage = 'addAppointment.css';

$patients = Patient::listPatient();

//initialise un tableau d'erreur
$error = [];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //-si formuliare envoyé en post on va faire des choses 

    //-- verifier lastname -- //recupérer lastname et on nettoie
    $patient = trim(filter_input(INPUT_POST, 'patientSelect', FILTER_SANITIZE_SPECIAL_CHARS)); //full posait des problémes sur les accent


    if (empty($patient)) {
        $error['patient'] = 'Veuillez saisir un patient.';
    } else {
        $checkPatient = filter_var(
            $patient,
            FILTER_VALIDATE_INT,
        );
        if ($checkPatient === false) {
            $error['patient'] = 'Veuillez saisir un patient existant .';
        }
    }


    //-- verif d --
    $tripStart = filter_input(INPUT_POST, 'tripStart', FILTER_SANITIZE_NUMBER_INT); //sur une date de naissance car auto +-

    if (empty($tripStart)) {
        $error['tripStart'] = 'Veuillez saisir un jour de rendez-vous';
    } else {
        $checkTripStart = filter_var(
            $tripStart,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REGEX_DATE . '/')) //regex on peux en laisser coté back 
        );
        if ($checkTripStart === false) {
            $error['tripStart'] = 'Veuillez saisir un jour valide .';
        }
    }

    $appt = filter_input(INPUT_POST, 'appt', FILTER_SANITIZE_SPECIAL_CHARS); //-+ chiffre

    if (empty($appt)) {
        //pas de else car pas obligatoire en front qd pas"required"{
        $error['appt'] = 'Veuillez saisir un horaire';
    } else {
        $checkAppt = filter_var(
            $appt,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REGEX_TIME . '/'))
        );
        if ($checkAppt === false) {
            $error['appt'] = 'Veuillez saisir un créneau valide.';
        }
    }
    // var_dump($error);
    if (empty($error)) {
        $dateHour = $tripStart . ' ' . $appt;
        $appoint = new Appointment($dateHour, $patient); //hydrater notre objet
        // $appointment->setidPatients($patient);
        $addAppointment = $appoint -> addAppointment();




        //apres avoir hydrater le patient on execute la méthode 
        //si bien ajouter en base de donnée je lui indique le message auqual j'ajoute une classe pr s'affichde tel ou 
        //tel couleur

        if ($addAppointment === false) {
            $error['addAppointment'] = "Le rendez-vous n'a pas été envoyé en base de donnée";
            $className['addAppointment'] = 'error';
        } else {
            $error['addAppointment'] = " Le rendez-vous est validé avec succés en base de donnée";
            $className['addAppointment'] = 'sucess';
        }
    }
}


//-Appel de la page "Accueil"
include(dirname(__FILE__) . '/../views/templates/header.php');
//-ligne qui se relie à la views associée //
include(dirname(__FILE__) . '/../views/addAppointment.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
