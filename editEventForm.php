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
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/event.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h1>Edit Event Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editEventForm" name="editEventForm" action="editEvent.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value="<?php
                                if (isset($_POST) && isset($_POST['title'])) {
                                    echo $_POST['title'];
                                }
                                else echo $row['title'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['title'])) {
                                    echo $errorMessage['title'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="<?php
                                if (isset($_POST) && isset($_POST['description'])) {
                                    echo $_POST['description'];
                                }
                                else echo $row['description'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['description'])) {
                                    echo $errorMessage['description'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Start Date and Time</td>
                        <td>
                            <input type="text" name="startDateTime" value="<?php
                                if (isset($_POST) && isset($_POST['startDateTime'])) {
                                    echo $_POST['startDateTime'];
                                }
                                else echo $row['startDateTime'];
                            ?>" />
                            <span id="startDateTimeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['startDateTime'])) {
                                    echo $errorMessage['startDateTime'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>End Date and Time</td>
                        <td>
                            <input type="text" name="endDateTime" value="<?php
                                if (isset($_POST) && isset($_POST['endDateTime'])) {
                                    echo $_POST['endDateTime'];
                                }
                                else echo $row['endDateTime'];
                            ?>" />
                            <span id="endDateTimeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['endDateTime'])) {
                                    echo $errorMessage['endDateTime'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Maximum Attendance</td>
                        <td>
                            <input type="text" name="maxAttendees" value="<?php
                                if (isset($_POST) && isset($_POST['maxAttendees'])) {
                                    echo $_POST['maxAttendees'];
                                }
                                else echo $row['maxAttendees'];
                            ?>" />
                            <span id="maxAttendeesError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['maxAttendees'])) {
                                    echo $errorMessage['maxAttendees'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
					<tr>
                        <td>Event Cost</td>
                        <td>
                            <input type="text" name="cost" value="<?php
                                if (isset($_POST) && isset($_POST['cost'])) {
                                    echo $_POST['cost'];
                                }
                                else echo $row['cost'];
                            ?>" />
                            <span id="costError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['cost'])) {
                                    echo $errorMessage['cost'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
					<tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {
                                    echo $_POST['name'];
                                }
                                else echo $row['name'];
                            ?>" />
                            <span id="nameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
					<tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php
                                if (isset($_POST) && isset($_POST['email'])) {
                                    echo $_POST['email'];
                                }
                                else echo $row['email'];
                            ?>" />
                            <span id="email" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['email'])) {
                                    echo $errorMessage['email'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                    <tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Event" name="updateEvent" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php' ?>
    </body>
</html>
