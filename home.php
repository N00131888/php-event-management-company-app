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
        
        <meta charset = "utf-8"><!--so browsers can read and display characters-->
		<meta name="viewport" content="width=device-width, initial-scale=1"><!-- This means that the browser will (probably) render the width of the page at the width of its own screen. -->
		<title>Bootstrap</title>

		<script src ="js/respond.min.js"></script><!--this is what we downloaded from github, link on facebook, we need to have this in the head-->

		<link href = "css/bootstrap.min.css" rel = "stylesheet"><!--this is the bootstrap framework stylesheet-->
		<link href = "css/custom.css" rel = "stylesheet">
		
		<script type="text/javascript" src="js/d3.min.js"></script><!--d3 script -->

    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <h2>Dashboard</h2>
        <?php require 'footer.php' ?>
        
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
      <div class="table-responsive">          
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Title</th>
			<th>Description</th>
			<th>Start Date and Time</th>
			<th>End Date and Time</th>
			<th>Maximum Attendance</th>
			<th>Cost</th>
			<th>Name</th>
			<th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Anna</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      </div>
				</div>
			</div>
        
        <!-- js just before end of body tag, for speed and content to load first.-->
	<!-- It's O.K to put these scripts in the body -->
	<!--website loads first and the scripts load behing the scenes-->
	<script src = "http://code.jquery.com/jquery-latest.min.js"></script><!-- using the content delivery network(CDN) for speed and efficiency -->
	<script src = "js/bootstrap.min.js"></script><!-- This is the bootstrap script -->

		
    </body>
</html>
