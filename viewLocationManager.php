<?php
require_once 'Connection.php';
require_once 'LocationManagerTableGateway.php';
require_once 'LocationTableGateway.php';

$sessionId = session_id();
if ($sessionId == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$locationManagerGateway = new LocationManagerTableGateway($connection);
$locationGateway = new LocationTableGateway($connection);

$locationManagers = $locationManagerGateway->getLocationManagerById($locationManagerID);
$locations = $programmerGateway->getLocationManagersByVenueID($venueID);
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
            <h2>View Location Manager Details</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table">
                <tbody>
                    <?php
                    $locationMmanager = $locationManagers->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Name</td>'
                    . '<td>' . $locationManager['fName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Office</td>'
                    . '<td>' . $locationManager['lName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Phone Number</td>'
                    . '<td>' . $locationManager['phoneNum'] . '</td>';
                    echo '</tr>';
                    echo '<td>Email</td>'
                    . '<td>' . $locationManager['email'] . '</td>';
                    echo '</tr>';
                    ?>
                </tbody>
            </table>
            <p>
                <a href="editLocationManagerForm.php?id=<?php echo $locationManager['locationManagerID']; ?>">
                    Edit Location Manager</a>
                <a class="deleteLocationManager" href="deleteLocationManager.php?id=<?php echo $locationManager['locationManagerID']; ?>">
                    Delete Location Manager</a>
            </p>
            <h3>Locations Assigned to <?php echo $locationManager['fName']; ?></h3>
            <?php if ($locations->rowCount() !== 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Location Maximum Attendance</th>
                            <th>Manager's Name</th>
                            <th>Manager's Email</th>
                            <th>Manager's Mobile</th>
                            <th>Location Manager</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = $locations->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['address'] . '</td>';
                            echo '<td>' . $row['locMaxAttendees'] . '</td>';
                            echo '<td>' . $row['manName'] . '</td>';
                            echo '<td>' . $row['manEmail'] . '</td>';
                            echo '<td>' . $row['manMobile'] . '</td>';
                            echo '<td>'
                            . '<a href="viewLocation.php?id='.$row['locationID'].'">View</a> '
                            . '<a href="editLocationForm.php?id='.$row['locationID'].'">Edit</a> '
                            . '<a class="deleteLocation" href="deleteLocation.php?id='.$row['locationID'].'">Delete</a> '
                            . '</td>';
                            echo '</tr>';

                            $row = $locations->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>There are no locations assigned to this manager.</p>
            <?php } ?>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
