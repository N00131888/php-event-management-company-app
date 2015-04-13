<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';
require_once 'EventTableGateway.php';

$sessionId = session_id();
if ($sessionId == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$locationID = $_GET['locationID'];

$connection = Connection::getInstance();
$locationGateway = new LocationTableGateway($connection);

$locations = $locationGateway->getLocationById($id);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<script type="text/javascript" src="js/manager.js"></script>-->
        <?php require "styles.php" ?>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <div class="container">
            <h2>View Location Details</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table">
                <tbody>
                    <?php
                    $location = $locations->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Name</td>'
                    . '<td>' . $location['name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Address</td>'
                    . '<td>' . $location['Address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Location Maximum Attendance</td>'
                    . '<td>' . $location['locaMAxAttendees'] . '</td>';
                    echo '</tr>';
                    echo '<td>Managers Name</td>'
                    . '<td>' . $location['manName'] . '</td>';
                    echo '</tr>';
                    echo '<td>Manager Email</td>'
                    . '<td>' . $location['manEmail'] . '</td>';
                    echo '</tr>';
                    echo '<td>Manager Mobile</td>'
                    . '<td>' . $location['manMobile'] . '</td>';
                    echo '</tr>';
                    ?>
                </tbody>
            </table>
            <p>
                <a href="editLocationForm.php?id=<?php echo $location['locationID']; ?>">
                    Edit Location</a>
                <a class="deleteLocation" href="deleteLocation.php?id=<?php echo $location['locationID']; ?>">
                    Delete Location</a>
            </p>            
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
