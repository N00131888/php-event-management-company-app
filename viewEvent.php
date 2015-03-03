<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEventById($id);
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
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Title</td>'
                    . '<td>' . $row['title'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Description</td>'
                    . '<td>' . $row['description'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Start Date and Time</td>'
                    . '<td>' . $row['startDateTime'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>End Date and Time</td>'
                    . '<td>' . $row['endDateTime'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Maximum Attendance</td>'
                    . '<td>' . $row['maxAttendees'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Cost</td>'
                    . '<td>' . $row['cost'] . '</td>';
                    echo '</tr>';
					echo '<td>Name</td>'
                    . '<td>' . $row['name'] . '</td>';
                    echo '</tr>';
					echo '<td>Email</td>'
                    . '<td>' . $row['email'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editEventForm.php?id=<?php echo $row['eventID']; ?>">
                Edit Event</a>
            <a href="deleteEvent.php?id=<?php echo $row['eventID']; ?>">
                Delete Event</a>
        </p>
        <?php require 'footer.php' ?>
    </body>
</html>