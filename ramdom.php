<?php 
	
session_start();

	require_once "connect.php";

    if(!isset($_SESSION["code_access"]) || $_SESSION["code_access"] !== true){
        header("location: index.php");
        exit;
    }else{
   

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';

        $duration = floor(time()/(60*1));
        srand($duration);
        $_SESSION["code"] = substr(str_shuffle($permitted_chars), 0, 6);
                
        date_default_timezone_set('Asia/Manila');

        $currentDate = date('Y-m-d H:i:s');
        $currentDate_timestamp = strtotime($currentDate);
        $endDate_months = strtotime("+5 minutes", $currentDate_timestamp);
        $packageEndDate = date('Y-m-d H:i:s', $endDate_months);
            
        $_SESSION["current"] = $currentDate;
        $_SESSION["expired"] = $packageEndDate;

        $user_id = $_SESSION["id"];
        $code2 = $_SESSION["code"];
        

        $sql = "INSERT INTO authentication(auth_code, new, expire, user_id) VALUES('".$_SESSION["code"]."','$currentDate', '$packageEndDate', '$user_id')";
        
        $result = mysqli_query($db,"SELECT * FROM authentication WHERE auth_code='$code2'") or die('Error connecting to MySQL server');
        $count = mysqli_num_rows($result);
        if($count == 0)
        {
            if(mysqli_query($db, $sql)){
               
            } else{
            echo "ERROR: $sql. " . mysqli_error($db);
            }
        }else{
       
        }

        
    }


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>CODE!!!!</title>
 </head>

 <style type="text/css">
 	
 	  body{
            background: url(hd10.jpg) center fixed;
        }

        .form-code {

            width: 300px;
            height: 100px;
            text-align: center;
            background-color: #F2F3F4;
            margin-top: 100px;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
            font-family: cursive;
            font-size: 18px;
            border: 3px solid blue;
            border-radius; 25px
        }

 </style>
 <body>

 	<div class="form-code" style="
    border-radius: 25px;
">

 		<p>HERE IS YOUR CODE : <b><?php echo $_SESSION["code"]; ?></b></p>


 	</div>
 
 </body>
 </html>