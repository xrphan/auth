<?php

	session_start();



	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

if(!isset($_SESSION["username"])){
	$_SESSION['msg'] = "You must log in first";
    header("location: welcome.php");}
  

  

    	if (isset($_GET['logout'])) {

    	$db = new mysqli('localhost', 'root', '', 'test4');
    	$event = mysqli_query($db, "INSERT INTO event_log(event_user, event_act, date) VALUES('".$_SESSION['username']."', 'Signed-Out', current_timestamp())");

    	if (isset($_SESSION['username'])) {
    		

    	session_destroy();
	  	unset($_SESSION['username']);
	  	header("location: index.php");
    	}
    	
    	}
   

   
	  
  
  


?>

<!DOCTYPE html>
<html>
<head>
	<title>My Website</title>
</head>


<body>

<center>
</center>

<div class="content">



    	
    	
       <h1>PASOK NA </h1>

</div>

	<video width="1500" height="1000" autoplay>
  <source src="chika.mp4" type="video/mp4">
</video>
<p> <a href="welcome.php?logout='1'" style="color: red;" >logout</a> </p>

</body>
</html>