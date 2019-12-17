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
$tbl_name="servicer"; 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$conn = new mysqli($host, $username, $password, $db_name);
$srName=$_POST['srName']; 
$srEmail=$_POST['srEmail']; 
$srPassword=$_POST['srPassword'];
$srPhone=$_POST['srPhone'];
$srAddress=$_POST['srAddress'];
 
$srPhoto = '';
$srSkills = $_POST['srSkills'];
$srMinPay = $_POST['srMinPay'];
$srTotalService = '';
$srServiceRatting = '';
         
         
$gender = 0;
         if (isset($_POST['srSubmit'])) {
             $selected_gender = $_POST['srGender'];

                if ($selected_gender == 'Male') {
                $gender = 'Male';
                                }
                else if ($selected_gender == 'Female') {
                    $gender = 'Female';
                }
             
             
             
             

             
        
//        if(getimagesize($_FILES['urPhoto']['tmp_name']) == FALSE){
//            echo "Please select an image";
//        }
//        else{
//            $urPhoto= addslashes($_FILES['urPhoto']['tmp_name']);
//            $urPhotoName= addslashes($_FILES['urPhoto']['urPhotoName']);
//            $urPhoto= file_get_contents($urPhoto);
//            $urPhoto= base64_encode($urPhoto);
//        }
    }
     

     
     

     
 

     
     
$sql = "INSERT INTO servicer (srName, srEmail, srPassword, srPhone, srAddress, srPhoto, srGender, srMinPay, srTotalService, srServiceRatting)
VALUES ('$srName','$srEmail', '$srPassword', '$srPhone', '$srAddress', '', '$gender', '$srMinPay', '', '')";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Registration successfull !!!</h1>";
    $srID= $conn->insert_id;
    
    }
	
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    
    
    
for($i=0; $i < count($srSkills); $i++){
   
//    echo "Selected " . $srSkills[$i] . "<br/>";
    $sqlSkills = "INSERT INTO skills (srID, skill) VALUES ('$srID', '$srSkills[$i]') ";
    $confirm = mysql_query($sqlSkills);
}


    
    
    
$conn->close();
    
    

    
    
    
    
?>
    
    
    
    
    
     
 </div>
    
    
    
    
	  
</body>
</html>