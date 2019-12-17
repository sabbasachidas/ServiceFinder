<?php
$host="localhost"; 
$username="root"; 
$password=""; 
$db_name="servicefinder"; 
$tbl_name="user"; 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$conn = new mysqli($host, $username, $password, $db_name);
$email=$_POST['email']; 
$password=$_POST['password']; 
 
$sql="SELECT * FROM user WHERE urEmail='$email' and urPassword='$password'";

$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count==1){
    $cType= "user";
	header('Location: home.html');
    
}

else {
    $sql2="SELECT * FROM servicer WHERE srEmail='$email' and srPassword='$password'";
    $result2=mysql_query($sql2);
    $count2=mysql_num_rows($result2);
    
    
    if($count2==1){
        $cType= "servicer";
	    header('Location: home.html');

    }
    else {
        echo "Wrong Username or Password";
    }
    
}



$conn->close();
?>