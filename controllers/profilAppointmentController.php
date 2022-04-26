<?php
require_once(dirname(__FILE__) . '/../models/Appointment.php');


$profilAppointmentPage = 'profilPatient.css';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$appointment = Appointment::getOneById($id);
if ($appointment instanceof PDOException) {
    $error = $appointment->getMessage();
}


include(dirname(__FILE__) . '/../views/templates/header.php');
include(dirname(__FILE__) . '/../views/profilAppointment.php');
include(dirname(__FILE__) . '/../views/templates/footer.php');
