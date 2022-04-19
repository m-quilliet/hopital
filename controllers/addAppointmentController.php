<?php
//depuis controllers comment je fais pr trouver mon fichier regex?
require_once(dirname(__FILE__).'/../config/regex.php');
//on appelle le modele 
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointment.php');


$addAppointment='addAppointment.css';

$patients = Patient::listPatient();

//initialise un tableau d'erreur
$error=[];



if($_SERVER['REQUEST_METHOD']=='POST'){ 
    
    //-si formuliare envoyé en post on va faire des choses 

    //-- verifier lastname -- //recupérer lastname et on nettoie
    $patient= filter_input(INPUT_POST, 'patientSelect', FILTER_SANITIZE_SPECIAL_CHARS);//full posait des problémes sur les accent
    if(empty($patient)){
        $error['patient']= 'Veuillez saisir un patient.';
    } else {
        $checkPatient= filter_var (
            $lastname,
            FILTER_VALIDATE_INT,

        );
        if($checkPatient === false){
            $error['patient']= 'Veuillez saisir un patient existant .';
        }
    }
    

   //-- verif de la date de naissance --
$tripStart= filter_input(INPUT_POST, 'tripStart', FILTER_SANITIZE_NUMBER_INT);//sur une date de naissance car auto +-
    if(empty($tripStart)){
        $error['tripStart']= 'Veuillez saisir un jour de rendez-vous';
    } else {
        $checkTripStart= filter_var (
            $tripStart,
            FILTER_VALIDATE_REGEXP,
            array("options" =>array("regexp" =>'/' .REGEX_DATE.'/' ))//regex on peux en laisser coté back 
        );
        if($checkTripStart === false){
            $error['tripStart']= 'Veuillez saisir un jour valide .';
        }
    }

        $appt= filter_input(INPUT_POST,'appt',FILTER_SANITIZE_NUMBER_INT);//-+ chiffre
        if(empty($appt)){
            //pas de else car pas obligatoire en front qd pas"required"{
                $error['appt']= 'Veuillez saisir un horaire'; 
            } else {  
            $checkAppt= filter_var(
                $appt,
                FILTER_VALIDATE_REGEXP,
                array("options"=>array("regexp"=> '/' .REGEX_TIME.'/' ))
            );
            if($checkAppt=== false){
                $error['appt']= 'Veuillez saisir un créneau valide.';
            }
}
}

 //-Appel de la page "Accueil"
include(dirname(__FILE__).'/../views/templates/header.php');
 //-ligne qui se relie à la views associée //
include(dirname(__FILE__).'/../views/addAppointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');

