<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == ""){
    session_start();
    
}

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
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        
        <div id = "header">
		<div class = "row">
			<div class = "col-lg-4">
						
		</div>
		<div class = "col-lg-offset-3 col-lg-1 nav ">
			<a href = "contact.html" class = "navBtn">Contact</a>
		</div>
		<div class = "col-lg-1 nav">
			<a href = "register.html"  class = "navBtn">Sign Up</a>
		</div>
		<div class = "col-lg-1 nav">
			<a href = "contact.html" class = "navBtn">Log Out</a>
		</div>

		<div class = "col-lg-1 nav">
			<a class = "navBtn"></a>
		</div>
		<div class = "col-lg-1 nav">
			<a class = "navBtn"></a>
		</div>
	</div>
</div>
        <div id = "dashboard">
			<div class = "row">
				<div class = "col-md-2 col-md-offset-2 userPic"><img src = "img/userimg.png" width = "175" height = "125" class = "userImg img-thumbnail"></div>
				<div class = "col-md-5 userText"><p><strong>Welcome: </strong></p>
				<img src = "img/location.png">Dublin, Ireland
				<img src = "img/message.png">Send Message<br>
				<img src = "img/Create.png" class = "iconspace">Create
				<img src = "img/edit.png">Edit
				<img src = "img/delete.png">Delete
				</div>
				<div class = "col-md-3">
					
				</div>
			</div>
			
			
			<hr class = "short"></hr>
        
        <div class = "row">
        <div class = "col-md-8 col-md-offset-2">
            <h2>Database Tables</h2>
                <p>View Your Database Tables Below:</p> 
                    <h3>Events Table</h3>
        <div class ="table-responsive">
        <table class = "table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date and Time</th>
                    <th>End Date and Time</th>
                    <th>Maximum Attendance</th>
                    <th>Cost</th>
                    <th>Name of organizer</th>
                    <th>Email of organizer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                    
                    echo '<td>' . $row['title'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['startDateTime'] . '</td>';
                    echo '<td>' . $row['endDateTime'] . '</td>';
                    echo '<td>' . $row['maxAttendees'] . '</td>';
                    echo '<td>' . $row['cost'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
      </div>
    </div>
        <p><a href="createEventForm.php">Create Event</a></p>
        <?php require 'footer.php' ?>
    </body>
</html>
