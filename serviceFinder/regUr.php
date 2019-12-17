<!DOCTYPE html>
<html lang="en" class=" js no-touch">
<head>
  <title>Service Finder</title>
  <meta charset="utf-8">
<!--  <meta name="viewport" content="width=device-width, initial-scale=1">-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  
  <style>
      body{
           background-color: 
#f4f6f9;

      }
    </style>
    
   

  
</head>
<body>
    
    <script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	
    

	<!--HEADER START-->
	<div class="main-navigation navbar-fixed-top">
		<nav class="navbar navbar-default">
			<div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.html">Service Finder</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
			    <li class="active"><a href="index.html">Home</a></li>
			    <li><a href="#contact">Contact</a></li>
			    <li><a href="index.html #about">About</a></li>
			    <li><a href="login.html">Login</a></li>
			    
			    <li><a href="signup.html">Signup</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
	</div>
	<!--HEADER END-->

	<!--BANNER START-->
	<div class="container" id="banner">
	    <h1>Service Finder</h1>
        <hr class="hr"></hr>
	</div>
	<!--BANNER END-->
    
 <div class="msg">
    
    
    
    
<?php
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="servicefinder"; 
$tbl_name="user"; 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$conn = new mysqli($host, $username, $password, $db_name);
$urName=$_POST['urName']; 
$urEmail=$_POST['urEmail']; 
$urPassword=$_POST['urPassword'];

$urAddress=$_POST['urAddress'];
$urPhone=$_POST['urPhone']; 
$gender = 0;

if (isset($_POST['urSubmit'])) {
         $selected_gender = $_POST['urGender'];

         if ($selected_gender == 'Male') {
                $gender = 'Male';
          }else if ($selected_radio == 'Female') {
                $gender = 'Female';
          }
    }
     


     
 

     
     
$sql = "INSERT INTO user (urName, urEmail, urPassword, urPhone, urAddress, urPhoto, urPhotoName, urGender)
VALUES ('$urName','$urEmail', '$urPassword', '$urPhone', '$urAddress', '', '', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Registration successfull !!!</h1>";
    
    }
	
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
    
    
    
    
    
     
 </div>
	  
</body>
</html>