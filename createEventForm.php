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
        <script type="text/javascript" src="js/event.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h1>Create Event Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
            
        }
        ?>
        <form action="createEvent.php" 
              method="POST"
              onsubmit="return validateCreateEvent(this);"> 
            <table border="0">
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="title" value="" />
                            <span id ="titleError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="" />
                            <span id="descriptionError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Start Date and Time</td>
                        <td>
                            <input type="text" name="startDateTime" value="" />
                            <span id="startDateTimeError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>End Date and Time</td>
                        <td>
                            <input type="text" name="endDateTime" value="" />
                            <span id="endDateTimeError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Maximum Attendance</td>
                        <td>
                            <input type="text" name="maxAttendees" value="" />
                            <span id="maxAttendeesError" class="error"></span>							
                        </td>
                    </tr>
                    <tr>
                        <td>Cost</td>
                        <td>
                            <input type="text" name="cost" value="" />
                            <span id="costError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="" />
                            <span id="nameError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="" />
                            <span id="emailError" class="error"></span>														
                        </td>
                    </tr>
                    <tr>                        
                        <td></td>
                        <td>
                            <input type="submit" value="Create Event" name="createEvent" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php require 'footer.php' ?>
    </body>
</html>
