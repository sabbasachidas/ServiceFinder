 <!DOCTYPE html>
<html lang="en" class=" js no-touch">
<head>
  <title>Service Finder</title>
  <meta charset="utf-8">
<!--  <meta name="viewport" content="width=device-width, initial-scale=1">-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/categoryAll.css">
  
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

	<!--BANNER START-->
	<div class="container" id="banner">
	    <h1>Service Finder</h1>
        <hr class="hr"></hr>
	</div>
	<!--BANNER END-->
<?php
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="servicefinder"; 
 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$conn = new mysqli($host, $username, $password, $db_name);

$sql="SELECT srID FROM skills WHERE skill='oven service'";

$result = $conn->query($sql);
    
    

    
    
//    
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "<br> id: ". $row["srID"]. "<br>";
//        print_r($row);
//    }
//} else {
//    echo "0 results";
//}







    
    
    
?>
 

  
   
    
   
<div class="text-center">
    <h2>Category/Oven service</h2>
    <table class="table table-striped" align="center">
        <tr>
            <td>Name</td>
            <td>Location</td>
            <td>Phone</td>
            <td>Ratting</td>
            <td>Minimum payment</td>
        </tr>
<?php
        
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//        print_r ($row);
        
        foreach($row as $i => $i_value){
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
        
        
    }
} 

else {
    echo "0 results";
}
   
     $conn->close();   
?>
        
        
        
        
    </table>
</div>        
            
                    

	  
</body>
</html>