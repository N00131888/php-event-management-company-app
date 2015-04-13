<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);

$id = $_POST['id'];
$name = $_POST['name'];

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);

//$email = $_POST['email'];
$name = $_POST['name'];
$address = $_POST['address'];
$locMaxAttendees = $_POST['locMaxAttendees'];
$manName = $_POST['manName'];
$manEmail = $_POST['manEmail'];
$manMobile = $_POST['manMobile'];

$manEmail = filter_input(INPUT_POST, 'manEmail', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
$gateway->updateLocation($id, $name, $address, $locMaxAttendees, $manName, $manEmail, $manMobile);

header('Location: viewLocations.php');






