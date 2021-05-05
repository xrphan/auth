<?php 

		$db = mysqli_connect('localhost', 'root', '', 'test4');

		if ($db->connect_error) {
			die("FAILED TO CONNECT" .$db->connect_error);
		}else{
			echo "";
		}




?>

