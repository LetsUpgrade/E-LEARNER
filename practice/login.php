<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign in </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form"  method="post" role="form">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="email" name="username" placeholder="username or email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="pass" placeholder="password" aria-placeholder="">
					<span class="focus-input100"></span>
				</div>

				<p>
					<span>
						<input type="checkbox">
					</span>
					Remeber me  
				</p>


				<div class="container-login100-form-btn">
					<input type="submit" name='signin' value='Sign In' class="login100-form-btn">
						
					
				</div>

				<hr>


				<div class="text-center"> Don't have an account?
					<a href="Sign_up.php" class="txt2 hov1">
						 <u>Sign Up</u>
					</a>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php

error_reporting(0);
include 'connection.php';

$em=$_POST['username'];
$pass=$_POST['pass'];
//include 'Sign_up.php';
//$name=$_POST['first_name'];
if(isset($_POST['signin'])){
	
	$select="SELECT * FROM sign_up WHERE user_email='$em'  AND user_password='$pass' ";
    $query=mysqli_query($conn,$select);
	$row=mysqli_num_rows($query);
	
   if($row==1)
    {
		$row_1 = $query->fetch_array();
		$_SESSION['username'] = $row_1['user_firstname'];
		$_SESSION['id'] = $row_1['user_id'];
		echo "<script>if(swal('Good job!', 'You have logged in successfully!', 'success')){document.location.href='practicepage.php'};</script>";
		   
        // $data=mysqli_fetch_assoc($query);
        // $_SESSION['name']=$data['name'];
       
	}
    else
    {
		?>
            <script>
                alet("you are mad!");
				//swal("Wrong!""Wrong Email-id and Password!! Try Again");
                window.open('Sign_up.php','_self');
            </script>
		<?php                                                                                              
	   }    
	}
	/*if(isset($_SESSION["user_id"])) {
		header("Location:praticepage.php");
	}*/
?>
