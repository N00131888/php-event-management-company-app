<?php
$id = session_id();
if($id == ""){
    session_start();
}

require 'ensureUserLoggedIn.php';

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
        <h1>Create Location Manager Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
            
        }
        ?>
        <form action="createLocationManager.php" 
              method="POST"
              onsubmit="return validateCreateLocationManager(this);"> 
            <table border="0">
                <tbody>
                    <tr>
                        <td>Venue ID</td>
                        <td>
                            <input type="text" name="venueID" value="" />
                            <span id ="venueIDError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="fName" value="" />
                            <span id="fNAmeError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <input type="text" name="lName" value="" />
                            <span id="lNameError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>
                            <input type="text" name="phoneNum" value="" />
                            <span id="phoneNumError" class="error"></span>														
                        </td>
                    </tr>                    
                    <tr>                        
                        <td></td>
                        <td>
                            <input type="submit" value="Create Location Manager" name="createLocationManager" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php require 'footer.php' ?>
    </body>
</html>
