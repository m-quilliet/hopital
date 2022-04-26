<?php
require_once(dirname(__FILE__).'/../models/Appointment.php');

$IdAppt= intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));

$delete= Appointment::deleteAppointment($IdAppt);



include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/delete.php');
include(dirname(__FILE__).'/../views/templates/footer.php');