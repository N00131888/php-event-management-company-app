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
        <script type="text/javascript" src="js/location.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h1>Create Location Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
            
        }
        ?>
        <form action="createLocation.php" 
              method="POST"
              onsubmit="return validateCreateLocation(this);"> 
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="" />
                            <span id ="nameError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="" />
                            <span id="addressError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Location Maximum Attendance</td>
                        <td>
                            <input type="text" name="locMaxAttendees" value="" />
                            <span id="locaMaxAttendeesError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's Name</td>
                        <td>
                            <input type="text" name="manName" value="" />
                            <span id="manNameError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's Email</td>
                        <td>
                            <input type="text" name="manEmail" value="" />
                            <span id="manEmailError" class="error"></span>							
                        </td>
                    </tr>
                    <tr>
                        <td>Manager's Mobile</td>
                        <td>
                            <input type="text" name="manMobile" value="" />
                            <span id="manMobileError" class="error"></span>														
                        </td>
                    </tr>                    
                </tbody>
            </table>
        </form>
        <?php require 'footer.php' ?>
    </body>
</html>
