<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

//$email = $_POST['email'];
$title = $_POST['title'];
$description = $_POST['description'];
$startDateTime = $_POST['startDateTime'];
$endDateTime = $_POST['endDateTime'];
$maxAttendees= $_POST['maxAttendees'];
$cost = $_POST['cost'];
$name = $_POST['name'];

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

$id = $gateway->insertEvent($title, $description, $startDateTime, $endDateTime, $maxAttendees, $cost, $name, $email);

header('Location: viewEvents.php');
