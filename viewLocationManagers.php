<?php
require_once 'Connection.php';
require_once 'LocationManagerTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$locationManagerGateway = new LocationManagerTableGateway($connection);

$locationManagers = $locationManagerGateway->getLocationManagers();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--<script type="text/javascript" src="js/programmer.js"></script>-->
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
                        <th>Venue ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $locationManagers->fetch(PDO::FETCH_ASSOC);
                    while ($row) {


                        echo '<td>' . $row['venueID'] . '</td>';
                        echo '<td>' . $row['fName'] . '</td>';
                        echo '<td>' . $row['lName'] . '</td>';
                        echo '<td>' . $row['phoneNum'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>'
                        . '<a href="viewLocationManager.php?id='.$row['locationManagerID'].'">View</a> '
                        . '<a href="editLocationManagerForm.php?id='.$row['locationManagerID'].'">Edit</a> '
                        . '<a class="deleteLocationManager" href="deleteManager.php?id='.$row['locationManagerID'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';

                        $row = $locationManagers->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <p><a href="createLocationManagerForm.php">Create Location Manager</a></p>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
