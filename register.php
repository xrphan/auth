<?php 

session_start();
include('connect.php'); 

		$username = "";
		$email = "";
		$errors = $arrayName = array();

if (isset($_POST['register'])) {
			  $username = mysqli_real_escape_string($db, $_POST['username']);
			  $email = mysqli_real_escape_string($db, $_POST['email']);
			  $question = mysqli_real_escape_string($db, $_POST['question']);
			  $answer = mysqli_real_escape_string($db, $_POST['answer']);
			  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
			  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);


			  if (empty($username)) {array_push($errors, "Username is required");
			  }

			   if (empty($email)) {array_push($errors, "Email is required");
			  }

			  if (empty($question)) {array_push($errors, "Question is required");
			  }

			  if (empty($answer)) {array_push($errors, "Answer is required");
			  }

			   if (empty($password_1)) {array_push($errors, "Password is required");
			  }

			   if ($password_1 != $password_2) {array_push($errors, "Password do not match");
			  }

			  // if there are no errors
			 
			  	# code...
			$sql_u = "SELECT * FROM users WHERE username='$username'";
		  	$sql_e = "SELECT * FROM users WHERE email='$email'";
		  	$res_u = mysqli_query($db, $sql_u);
		  	$res_e = mysqli_query($db, $sql_e);

		  	if (mysqli_num_rows($res_u) > 0) {
		  	  $name_error = "Sorry... username already taken"; 	
		  	}else if(mysqli_num_rows($res_e) > 0){
		  	  $email_error = "Sorry... email already taken"; 	
		  	}else{
		             if (count($errors) == 0) {


					  if ($password_1 != $password_2) {
					  	
					  	echo "PASSWORD ARE NOT MATCH";

					}else{
						$event = mysqli_query($db, "INSERT INTO event_log(event_user, event_act, date) VALUES('$username', 'Registered', current_timestamp())");
					  	$query = "INSERT INTO users (username, email, password, question, answer, date) 
					  	VALUES('$username', '$email', '$password_1', '$question', '$answer', current_timestamp())";

					  	mysqli_query($db, $query);


					  	$_SESSION['username'] = $username;
		  				$_SESSION['success'] = "You are now Registered";
		  				header('location: index.php');
		  			}
 
			  }
			}

		}



?>

<DOCTYPE html>
<html>
<head>
	<title>Register Form</title>

<style type="text/css">
	body {
	background: url(hd10.jpg) center fixed;
	background-repeat: no-repeat;
	background-size: cover;
}

div.login {

	font-size: 15px;
	background-color: white;
	width: 490px;
	height: auto;
	margin-left: 705px;
	margin-top: 145px;
	border-radius: 0px 0px 10px 10px;
	

	}

.header {

	text-align: center;
	padding: 20px;
	font-family: cursive;
	color: black;
	border-radius: 10px 10px 0px 0px;
	border-radius: 10px 10px 0px 0px;
}




input[type=text]{

height: 35px;
width: 350px;
border-radius: 5px;
padding: 10px;
margin-top: 20px;
margin-left: 80px;




}

input[type=password]{

height: 35px;
width: 350px;
border-radius: 5px;
padding: 10px;
margin-top: 20px;
margin-left: 80px;

}



input[type=submit]{

		float: right;
		width: 100px;
		height: 35px;
		margin-right: 200px;
		
		border-radius: 4px;
		font-family: cursive;
}

input[type=submit]:hover {

	background-color: #35AB0E;
}

p{
	margin-left: 80px;
	margin-top: 40px;
}

a:hover{
	color: #AB210E;
}


.error {

	width: 92%; 
  	margin: 0px auto; 
  	padding: 10px; 
  	border: 1px solid #a94442; 
 	 color: #a94442; 
  	background: #f2dede; 
  	border-radius: 5px; 
 	text-align: left;
}



	</style>




</head>
<body>
	<form method="POST">
	<div class="login" style="
    border-style: solid;
	border-color: blue;
    border-radius: 25px;
	background: #F2F3F4;
	">

<div class="header">
	<h1>Register Form</h1>
</div>



		<!--display validation here -->
			<?php include('error.php'); ?>
			&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Username
			<div class="username">
			
				<?php if (isset($name_error)): ?>
	  			<p><?php echo $name_error; ?></p>
	  			<?php endif ?>
					
				<input type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>">
				
				
			
			</div>
<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Email
		<div class="username">

				<?php if (isset($email_error)): ?>
	  			<p><?php echo $email_error; ?></p>
	  			<?php endif ?>
				<input type="text" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
				
				</div>
	<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Challenge Question

	<div class="QA">

		<input type="text" name="question" placeholder="Enter Question">

	</div>
	<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Challenge Answer

	<div class="QA">

		<input type="text" name="answer" placeholder="Enter Answer">

	</div>
	<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Password


	<div class="pass">
				<input type="password" name="password_1" placeholder="Enter Password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
			</div>
<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Confirm Password
			<div class="pass">
				<input type="password" name="password_2" placeholder="Enter Confirmed Password" pattern="(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
			</div>
<br>
			<div class="btn-login">
				<input type="submit" name="register" value="Sign-In">
			</div>
	
	<br><br>
	<p>Already a Member?<a href="index.php"> Sign-In Here</a></p>
		
<br><br>

	</form>

</div>


</body>
</html>