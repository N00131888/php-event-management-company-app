<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';



$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEvents();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>Dashboard</h2>
        <?php require 'footer.php' ?>
    </body>
</html>
