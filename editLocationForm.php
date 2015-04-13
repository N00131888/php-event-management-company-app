<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';

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
$gateway = new LocationTableGateway($connection);

$statement = $gateway->getLocationById($id);
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
        <script type="text/javascript" src="js/location.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h1>Edit Location Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editEventForm" name="editLocationForm" action="editLocation.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="<?php
                                if (isset($_POST) && isset($_POST['name'])) {
                                    echo $_POST['name'];
                                }
                                else echo $row['name'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['name'])) {
                                    echo $errorMessage['name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php
                                if (isset($_POST) && isset($_POST['address'])) {
                                    echo $_POST['address'];
                                }
                                else echo $row['address'];
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['address'])) {
                                    echo $errorMessage['address'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Location Maximum Attendance</td>
                        <td>
                            <input type="text" name="locMaxAttendees" value="<?php
                                if (isset($_POST) && isset($_POST['locMaxAttendees'])) {
                                    echo $_POST['locMaxAttendees'];
                                }
                                else echo $row['locMaxAttendees'];
                            ?>" />
                            <span id="locMaxAttendeesError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['locMaxAttendees'])) {
                                    echo $errorMessage['locMaxAttendees'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's Name</td>
                        <td>
                            <input type="text" name="manName" value="<?php
                                if (isset($_POST) && isset($_POST['manName'])) {
                                    echo $_POST['manName'];
                                }
                                else echo $row['manName'];
                            ?>" />
                            <span id="manNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['manName'])) {
                                    echo $errorMessage['manName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's Email</td>
                        <td>
                            <input type="text" name="manEmail" value="<?php
                                if (isset($_POST) && isset($_POST['manEmail'])) {
                                    echo $_POST['manEmail'];
                                }
                                else echo $row['manEmail'];
                            ?>" />
                            <span id="manEmailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['manEmail'])) {
                                    echo $errorMessage['manEmail'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
					<tr>
                        <td>Manager's Mobile</td>
                        <td>
                            <input type="text" name="manMobile" value="<?php
                                if (isset($_POST) && isset($_POST['manMobile'])) {
                                    echo $_POST['manMobile'];
                                }
                                else echo $row['manMobile'];
                            ?>" />
                            <span id="manMobileError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['manMobile'])) {
                                    echo $errorMessage['manMobile'];
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
                            <input type="submit" value="Update Location" name="updateLocation" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php' ?>
    </body>
</html>
