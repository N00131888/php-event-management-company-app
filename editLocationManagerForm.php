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
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new LocationManagerTableGateway($connection);

$statement = $gateway->getLocationManagerById($id);
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
        <script type="text/javascript" src="js/locationManager.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h1>Edit Location Manage Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editEventForm" name="editLocationManagerForm" action="editLocationManager.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>VenueID</td>
                        <td>
                            <input type="text" name="venueID" value="<?php
                                if (isset($_POST) && isset($_POST['venueID'])) {
                                    echo $_POST['venueID'];
                                }
                                else echo $row['venueID'];
                            ?>" />
                            <span id="venueIDError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['venueID'])) {
                                    echo $errorMessage['venueID'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="fName" value="<?php
                                if (isset($_POST) && isset($_POST['fName'])) {
                                    echo $_POST['fName'];
                                }
                                else echo $row['fName'];
                            ?>" />
                            <span id="fNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['fName'])) {
                                    echo $errorMessage['fName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <input type="text" name="lName" value="<?php
                                if (isset($_POST) && isset($_POST['lName'])) {
                                    echo $_POST['lName'];
                                }
                                else echo $row['lName'];
                            ?>" />
                            <span id="lNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['lName'])) {
                                    echo $errorMessage['lName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>
                            <input type="text" name="phoneNum" value="<?php
                                if (isset($_POST) && isset($_POST['phoneNum'])) {
                                    echo $_POST['phoneNum'];
                                }
                                else echo $row['phoneNum'];
                            ?>" />
                            <span id="phoneNumError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['manName'])) {
                                    echo $errorMessage['manName'];
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
                            <span id="emailError" class="error">
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
                            <input type="submit" value="Update Location Manager" name="updateLocationManager" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
        <?php require 'footer.php' ?>
    </body>
</html>
