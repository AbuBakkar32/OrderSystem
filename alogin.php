<?php
session_start();

 if(isset($_SESSION['username'])){
    header("location:ahome.php");
 }

$error="";

if(isset($_POST["submitt"]))
{
$user=$_POST["username"];
$pass=$_POST["password"];

$Connection=mysql_connect('localhost','root','');
$Selected=mysql_select_db('ordermanagement',$Connection);

$query=mysql_query("select * from adminlogin where adminUsername='$user' and adminPassword='$pass'");
$row=mysql_num_rows($query); 

  if($row==1){
    $_SESSION['username']=$user;
    header("location:ahome.php");
}
else{
    $error="Dear ".$user.", Your username or password Incorrect";
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
				<form class="login100-form validate-form flex-sb flex-w" method="post" action="alogin.php">
					<span class="login100-form-title p-b-53">
						Admin Login
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

						<a href="#" class="txt2 bo1 m-l-5">
							Forgot?
						</a>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button name="submitt" class="login100-form-btn">
                            <a  style="text-decoration: none; color: white;">Sign In</a>
						</button>
					</div>
					<p style="color: red;font-size: 15px; margin-left: 30px;"><?php echo $error;?></p>

					<div class="w-full text-center p-t-10" >
						<span class="txt2" >
							Forget Your Password?
						</span>

						<a href="registration.php" class="txt2 bo1">
							Click Here?
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