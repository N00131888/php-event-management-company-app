<?php
require_once 'Connection.php';
require_once 'LocationManagerTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['locationManagerID'];

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$gateway->deleteLocationManager($id);

header("Location: viewLocationManager.php");
?>
