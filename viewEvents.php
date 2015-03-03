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
        <?php
        if (isset($message)){
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date and Time</th>
                    <th>End Date and Time</th>
                    <th>Maximum Attendance</th>
                    <th>Cost</th>
                    <th>Name of Organiser</th>
                    <th>Email of Organiser</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                       echo '<tr>';
                       echo '<td>' . $row['title'] . '</td>';
                       echo '<td>' . $row['description'] . '</td>';
                       echo '<td>' . $row['startDateTime'] . '</td>';
                       echo '<td>' . $row['endDateTime'] . '</td>';
                       echo '<td>' . $row['maxAttendees'] . '</td>';
                       echo '<td>' . $row['cost'] . '</td>';
                       echo '<td>' . $row['name'] . '</td>';
                       echo '<td>' . $row['email'] . '</td>';
                       echo '<td>'
                    . '<a href="viewEvent.php?id='.$row['eventID'].'">View</a> '
                    . '<a href="editEventForm.php?id='.$row['eventID'].'">Edit</a> '
                    . '<a class="deleteEvent" href="deleteEvent.php?id='.$row['eventID'].'">Delete</a> '
                    .'</td>';
                       echo '</tr>';
                       
                       $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createEventForm.php">Create Event</a></p>
        <?php require 'footer.php' ?>
    </body>
</html>
