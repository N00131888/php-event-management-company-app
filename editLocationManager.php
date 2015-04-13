<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new LocationManagerTableGateway($connection);

$id = $_POST['id'];
$name = $_POST['name'];

$connection = Connection::getInstance();
$gateway = new LocationManagerTableGateway($connection);

//$email = $_POST['email'];
$venueID = $_POST['venueID'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$phoneNum = $_POST['phoneNum'];
$email = $_POST['email'];


$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
$gateway->updateLocation($locationManagerID, $venueID, $fName, $lName, $phoneNum, $email);

header('Location: viewLocationManagers.php');






