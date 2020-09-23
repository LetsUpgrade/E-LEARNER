<!--===============================================================================================-->	

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign_up</title>
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
</head>
<body>
	
	

	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="post" role="form" >
				<span class="login100-form-title p-b-37">
					Create Account
				</span>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter First">
					<input class="input100" type="text" name="first_name" placeholder=" Enter First Name" id="first_name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input m-b-20" data-validate="Last Name">
					<input class="input100" type="text" name="last_name" placeholder=" Enter Last Name",id="last_name">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter a vaild email">
					<input class="input100" type="email" name="email" placeholder="Enter email" id="email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="Enter password" id="pass"
					pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be minimum 8 characters containing a Uppercase, a Lowercase & a number" required >
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Confirm password">
					<input class="input100" type="password" name="con_password" placeholder="Confirm password" id="con_pass" required >
					<span class="focus-input100"></span>
				</div>

				<p>
					<span>
						<input type="checkbox">
					</span>
					I agree to the terms of services   
				</p>

				<div class="container-login100-form-btn">
					<input name='register' value='regsister' type='submit'  class="login100-form-btn" id='register' >
					
				</div>
				<hr>


			

				<div class="text-center ">
					Already have an account?
					<a href="login.php" class="txt2 hov1">
						<u>Sign In</u>
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
<!--=================================================================================================-->
<script>      
	var password = document.getElementById("pass")
	var confirm_password = document.getElementById("con_pass");
	var btnsubmit = document.getElementById("register");
        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
	
	btnsubmit.onclick = (()=>{
		validatePassword();

	});
</script>
</body>
</html>

<?php
	error_reporting(0);
	include 'connection.php';
	$fn =$_POST['first_name'];
	$ln =$_POST['last_name'];
	$em =$_POST['email'];
	$pass =$_POST['password'];
	/*echo "$fn <br>";
	echo "$ln <br>";
	echo "$em <br>";
	echo "$pass <br>";
	*/
		#$date = date ('Y-m-d ');
		#$sql = "INSERT INTO user (user_firstname , user_lastname , user_email , user_password , user_date 
		#) VALUES ('$fn,'$ln','$em','$pass',$date)";
		      
		/*if(!$run_sql)
		{
	       echo " <br> Failed";   
	   }
	   else{
       
    	   echo "Data Added";
	   }*/
	   if(isset( $_POST['register'])){
	   $select="SELECT * FROM sign_up WHERE user_email='$em'";
	   $run_sql=mysqli_query($conn,$select);
	   $num=mysqli_num_rows($run_sql);
	   if($num>0)
	   {
		   ?>
		   <script> alert("Email id is already exists! Register with different email");
		   window.open('Sign_up.php','_self');</script>
		   <?php
		   
	   }
	   else{
			$sql = "INSERT INTO sign_up (user_firstname , user_lastname , user_email , user_password , user_date ) VALUES ('$fn','$ln','$em','$pass',now())";
    	    $row = mysqli_query($conn , $sql);  

		   if($row==true)
		   {
		   ?> 
			   <script> alert("Registed Succesfully In E-Learing Port");
			   window.open('login.php','_self');</script>
		   <?php
		   }
		   else{
			   echo "error";
		   }
		}
	   }
?>