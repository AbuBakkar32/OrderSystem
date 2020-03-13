<?php
include('Connection.php');
$error="";
session_start();
 if(isset($_SESSION['username'])){
    header("location:home.php");
 }

if(isset($_POST["submit"]))
{
	
$username=$_POST["username"];
$Password=$_POST["pass"];

$query=mysql_query("select * from customer where cusName='$username' and password='$Password'");
while($row=mysql_fetch_array($query)){
	$id=$row['cusId'];
}

$row=mysql_num_rows($query) ; 
  if($row==1){
    $_SESSION['username']=$username;
    $_SESSION['id']=$id;
    header("location:home.php");
}
else{
    $error="Dear ".$username.", Your username or password Incorrect";
}
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login1.css">
	<link href="css/animationn.css" rel="stylesheet"/>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-2.jpeg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="login.php">
					<span class="login100-form-title p-b-53">
						Consumer Login
					</span>

					<!--<a href="http://www.facebook.com/" class="btn-face m-b-20 animated lightSpeedIn" style="text-decoration: none">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="http://www.gmail.com/" class="btn-google m-b-20 animated lightSpeedIn" style="text-decoration: none" >
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>-->
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Username
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>

						<a href="RecoveryPassword.php" class="txt2 bo1 m-l-5">
							Forgot?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button name="submit" class="login100-form-btn">
                            <a  style="text-decoration: none; color: white;">Sign In</a>
						</button>
					</div>
					<p style="color: red;font-size: 15px; margin-left: 30px;"><?php echo $error;?></p>

					<div class="w-full text-center p-t-10" >
						<span class="txt2" >
							Not a member?
						</span>

						<a href="registration.php" class="txt2 bo1">
							Sign up now
						</a>
					</div>
					
				</form>
			</div>
		</div>
	</div>
	
	
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="js/main.js"></script>

</body>
</html>