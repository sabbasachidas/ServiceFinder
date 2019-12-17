<!DOCTYPE html>
<html lang="en" class=" js no-touch">
<head>
  <title>Service Finder</title>
  <meta charset="utf-8">
<!--  <meta name="viewport" content="width=device-width, initial-scale=1">-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/search.css">
  
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
			    <li><a href="#about">About</a></li>
			    <li><a href="login.html">Login</a></li>
			    
			    <li><a href="signup.html">Signup</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
	</div>
	<!--HEADER END-->
<div class="result">
	
  <?php
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="servicefinder"; 
 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$conn = new mysqli($host, $username, $password, $db_name);
if (isset($_POST['selectLocation'])) {
        $location = $_POST['selectLocation'];
                
    }
if (isset($_POST['selectSkill'])) {
        $skill = $_POST['selectSkill'];
                
    }
$sql="SELECT srID FROM skills WHERE skill='$skill'";
$sql3="SELECT srID FROM servicer WHERE srAddress='$location'";

$result = $conn->query($sql);
    
$result3 = $conn->query($sql3);
?>
 
  
<div class="text-center">
    <h2>Category/AC service</h2>
    <table class="table table-striped" align="center">
        <tr>
            <td>Name</td>
            <td>Location</td>
            <td>Phone</td>
            <td>Ratting</td>
            <td>Minimum payment</td>
        </tr>
<?php
$skillArray = array();
$locationArray = array();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
       // print_r ($row);
        foreach($row as $i => $i_value){
            $skillArray[] = $i_value;
        }
    }
}
else {
    echo "0 results";
}
if($result3->num_rows > 0){
    while($row3 = $result3->fetch_assoc()){
      //  print_r ($row3);
        foreach($row3 as $j => $j_value){
            $locationArray[] = $j_value;
        }
    }
}
else {
    echo "0 results";
}
$intersectArray = array_intersect($locationArray,$skillArray);
for($k=0; $k < count($intersectArray); $k++){
      $sql2= "SELECT srName, srAddress,srPhone, srServiceRatting, srMinPay FROM servicer WHERE srID='$i_value'";
            $result2 = $conn->query($sql2);
            while($row2 = $result2->fetch_assoc()) {
?>
                <tr>
                   <td>
                         <?php   echo $row2["srName"]; ?>
                 </td>
                   <td>
                        <?php    echo $row2["srAddress"]; ?>
                    </td>
                    <td>
                        <?php    echo $row2["srPhone"];  ?>
                    </td>
                    <td>
                        <?php    echo $row2["srServiceRatting"]; ?>
                    </td>
                    <td>
                        <?php    echo $row2["srMinPay"]; ?>
                    </td>
                   

                </tr>
                    <?php
                
            }
}

//        echo "<br>";
//   print_r ($skillArray);
//        echo "<br>";
//        print_r ($locationArray);
//        echo "<br>";
//        print_r($intersectArray);
     $conn->close();   
?>    
        
        
    
</div>        
            
                    

	  
</body>
</html>