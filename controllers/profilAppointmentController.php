<?php
$profilAppointmentPage='profilPatient.css';

require_once (dirname(__FILE__).'/../models/Appointment.php');

$idPatients = intval(filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT));

$idPatients = Appointment::profilAppointment($idPatients);
if ($idPatients instanceof PDOException) {
    $error=$idPatients->getMessage();
}
include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/profilAppointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');