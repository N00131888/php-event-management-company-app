<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$locationGateway = new LocationTableGateway($connection);

$locations = $locationGateway->getLocations();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/location.js"></script>
        <?php require "styles.php" ?>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <div class="container">
            <h2>View Locations</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Locations Maximum Attendance</th>
                        <th>Manager's Name</th>
                        <th>Manager's Email</th>
                        <th>Manager's Mobile</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $locations->fetch(PDO::FETCH_ASSOC);
                    while ($row) {


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
            <p><a href="createLocationForm.php">Create Location</a></p>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
