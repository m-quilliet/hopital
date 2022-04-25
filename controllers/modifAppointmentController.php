<?php
$modifAppointementPage='addAppointmentPage.css';//lien css

require_once(dirname(__FILE__).'/../models/Appointment.php');
require_once(dirname(__FILE__).'/../models/Patient.php');

require_once(dirname(__FILE__).'/../config/regex.php');


$title='Modification du Rendez-vous';

$listPatients= Patient:: listPatient();
$idAppointment= intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
$result=Appointment::profilAppointment($idAppointment);


if($_SERVER['REQUEST_METHOD']=='POST'){

    //vérif du nom
    $name= trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));

    if(empty($name)){
        $error['name']= 'Veuillez saisir un nom .';
    } else {
        $checkName= filter_var (
            $name,
            FILTER_VALIDATE_INT
        );
        if($checkName === false){
            $error['name']= 'Veuillez saisir un nom valide .';
        }
    }
    

    //vérif de la date 
    $date= filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT); 
    if(empty($date)){
        $error['date']= 'Veuillez saisir une date .';
    } else {
        $checkDate= filter_var (
            $date,
            FILTER_VALIDATE_REGEXP,
            array("options" =>array("regexp" =>'/'.REGEX_DATE.'/'))
        );
        if($checkDate === false){
            $error['date']= 'Veuillez saisir une date valide.';
        }
    }

    //vérif choix de l'heure

    $time= filter_input(INPUT_POST, 'time', FILTER_SANITIZE_SPECIAL_CHARS); 

    if(empty($date)){
        $error['time']= 'Veuillez choisir un horaire .';
    } else {
        $checkTime= filter_var (
            $time,
            FILTER_VALIDATE_REGEXP,
            array("options" =>array("regexp" =>'/'.REGEX_TIME.'/'))
        );
        
        if($checkTime === false){
            $error['time']= 'Veuillez saisir un horaire valide.';
        }

    }
    $dateHour = $date.' '.$time;
    if (Appointment::isExist($dateHour)) {
        $error['dateHour'] = 'L\'heure est déja prise !!';
    }
    if (empty($error)) {
        $appointment = new Appointment($dateHour,$name);

        $resultModif = $appointment->modifAppointment($idAppointment);
//Message de success
    if ($resultModif === true){
        $error['addAppointment']= 'Le rendez-vous a bien été enregistré';
        $className['addAppointment']='success';
    }else{
        $error['addAppointment']= 'une erreur est survenue!';
        $className['addAppointment']='error';
    }
    }
}


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/addAppointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');