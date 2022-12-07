<?php
require_once(__DIR__ . '/../../config/config.php');
require_once(__DIR__ . '/../../models/User.php');
require_once(__DIR__ . '/../../helpers/database.php');
require_once(__DIR__ . '/../../helpers/SessionFlash.php');
require_once(__DIR__ . '/../../models/Appointment.php');
require_once(__DIR__ . '/../../models/Car.php');

$appointments = Appointment::displayAllByDate();

include(__DIR__.'/../../views/templates/sidebar.php');
include(__DIR__.'/../../views/admin/appointmentList.php');
include(__DIR__.'/../../views/templates/lightFooter.php');