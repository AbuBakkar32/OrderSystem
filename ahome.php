<?php
include('Connection.php'); /* This is the Connection of Database*/
session_start();
 if(!isset($_SESSION['username'])){     /*if no Session Create it will be Log into the Login Panel*/
   header("location:alogin.php");
 }
           $firstName="";
           $lastName="";
           $password="";          /*First time input field Empty*/
           $address="";
           $phone="";
           $email="";

include('Connection.php');
   
    $UpdateRecord=$_GET['Update'];
    $Show_Query="SELECT * FROM customer WHERE cusId='$UpdateRecord'";
    $Execute=mysql_query($Show_Query);

 while($DataRows=mysql_fetch_array($Execute)){  
           $firstName=$DataRows['cusId'];
           $lastName=$DataRows['cusName'];
           $password=$DataRows['password'];  /*When we Click on Update button The input field automatic will be fill*/
           $address=$DataRows['address'];
           $phone=$DataRows['phone'];
           $email=$DataRows['mail'];
 }

if(isset($_POST["submited"])){

$cid=$_POST["firstName"];
$cname=$_POST["lastName"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$country=$_POST["country_name"];  /* This Code Only for Update the database */
$address=$_POST["address"];
$phone=$_POST["phone"];
$email=$_POST["email"];

$query=mysql_query("UPDATE  customer SET cusName='$cname', password='$password', gender='$gender', country='$country', address='$address', phone='$phone', mail='$email' WHERE cusId='$cid'");
header("location:ahome.php");

if($query){
header("location:ahome.php");
echo'<script>alert("Successfully Updated!");</script>';
}

else{
echo'<script>alert("Oops!Try Again Please");</script>';
 }
}



include('Connection.php');
if(isset($_POST["submit"])){

$cid=$_POST["firstName"];
$cname=$_POST["lastName"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$country=$_POST["country_name"];        /*This is the Code for insert the value into the Database*/
$address=$_POST["address"];
$phone=$_POST["phone"];
$email=$_POST["email"];

$query=mysql_query("INSERT INTO customer(cusId,cusName,password,gender,country,address,phone,mail) VALUES('$cid','$cname','$password','$gender','$country','$address','$phone','$email')");

if($query){
header("location:ahome.php");
echo'<script>alert("Successfully Inserted!");</script>';
}

else{
echo'<script>alert("Oops!Try Again Please");</script>';
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amar Panno</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet" />
    <link href="css/animationn.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand">
                            <a href="index.html">
                                <h1 class="animated fadeInLeft slower"><span>Amader</span>Panno</h1>
                            </a>
                        </div>
                    </div>

                    <div class="navbar-collapse collapse">
                        <div class="menu">
                            <ul class="nav nav-tabs " role="tablist">
                                <li role="presentation" class=""><a href="ahome.php" class="active fa-spin">Home</a></li>
                                <li role="presentation"><a href="aorder.php">Order</a></li>
                                <li role="presentation"><a href="aproduct.php">Product</a></li>
                                <li role="presentation"><a href="aProductBuy.php">Sell Product</a></li>
                                <li class="loginn"><a style="color:#FFFFFF;background-color:#3E8CCC" href="#"><?php echo "Welcome: ".$_SESSION['username'] ?></a></li>
                                <li class="login" role="presentation"><a href="adminLogout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="row search">
                <div class="col-md-12">
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" name="search" id="search" value="" placeholder="Coustomer ID or Name" class="form-control">
                            <span class="input-group-btn buton">
                                <input type="submit" name="commit" value="Search" class="btn btn-primary" data-disable-with="Search">
                            </span>
                        </div>
                    </form>
                </div>
            </div>
    </section>

    <div class="tabledetails">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-4 mt-5 inputform">
                <div class="mainform">
                    <form action="ahome.php" method="post">
                        <table class="animated fadeInLeft">
                            <fieldset>
                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Customer ID</lebel>
                                    </td>
                                    <td><input type="text" name="firstName" value="<?php echo $firstName; ?>" placeholder="Customer ID"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Customer Name</lebel>
                                    </td>
                                    <td><input type="text" name="lastName" value="<?php echo $lastName; ?>" placeholder="Customer Name"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Password</lebel>
                                    </td>
                                    <td><input type="password" name="password" value="<?php echo $password; ?>" placeholder="Password"></td>
                                </tr>

                                <td>
                                    <lebel class="lebel" style="color:black">Gender</lebel>
                                </td>
                                <td style="font-weight: 700;">
                                    <input type="radio" name="gender" value="Male" checked> Male
                                    <input type="radio" name="gender" value="Female"> Female
                                    <input type="radio" name="gender" value="Other"> Other</td>
                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Country</lebel>
                                    </td>
                                    <td>
                                        <select name="country_name">
                                            <option name="Bangladesh" value="Bangladesh">Bangladesh</option>
                                            <option name="England " value="England">England</option>
                                            <option name="Australia" value="Australia">Australia</option>
                                            <option name="America " value="America">America</option>
                                            <option name="Germany " value="Germany">Germany</option>
                                            <option name="Canada " value="Canada">Canada</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Address</lebel>
                                    </td>
                                    <td><input type="text" name="address" value="<?php echo $address; ?>" placeholder="Address"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Phone</lebel>
                                    </td>
                                    <td><input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="Phone"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Mail</lebel>
                                    </td>
                                    <td><input type="email" name="email" value="<?php echo $email; ?>" placeholder="Mail"></td>
                                </tr>
                                <tr>
                                    <td><button class="buttonn" name="submit"><a href="">Save</a></button></td>
                                     <td><button class="buttonn" name="submited"><a href="">Update</a></button></td>
                                </tr>
                            </fieldset>

                        </table>
                    </form>
                </div>
            </div>

            <div class="  col-md-12 col-sm-12 col-lg-8 mt-5">
                <h2 class="text-center animated fadeInRight" style="font-weight: 700; padding: 15px;">Registered Customer </h2>
                <table class="table table-hover table-bordered animated fadeInRight">
                    <thead>
                        <tr>
                            <th>Customer Id</th>
                            <th scope="col">Customer name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Country</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>

                        </tr>
                    </thead>

<?php
    include('Connection.php');
    
    if(isset($_POST["commit"])){   
    $Name=$_POST["search"];        /*This code Only for search the Table Data in many ways*/
    
    $ViewQuery="SELECT * FROM customer WHERE CONCAT(cusId,cusName,gender,country,address,phone) LIKE '%".$Name."%'";
    $Execute=mysql_query($ViewQuery);
}else{
       $ViewQuery="SELECT * FROM customer";
       $Execute=mysql_query($ViewQuery);       /*This code for view all data in a table*/
}

?>

<?php
       include('Connection.php');
       while($DataRows=mysql_fetch_array($Execute)):?> <!-- It will fetch all data from database until it false-->

                    <tr>
                        <td><?php echo $DataRows['cusId']; ?></td>
                        <td><?php echo $DataRows['cusName']; ?></td>
                        <td><?php echo $DataRows['gender']; ?></td>
                        <td><?php echo $DataRows['country']; ?></td>  <!--It can fill the all data into the table-->
                        <td><?php echo $DataRows['address']; ?></td>
                        <td><?php echo $DataRows['phone']; ?></td>
                        <td><?php echo $DataRows['mail']; ?></td>
                        <td><a href="Delete.php? Delete=<?php echo $DataRows['cusId']; ?>" style="color: red">Delete</a></td>
                        <td><a href="ahome.php? Update=<?php echo $DataRows['cusId']; ?>" style="color: green">Update</a></td>
                    </tr>

                    <?php endwhile;?>

                </table>
            </div>
        </div>
    </div>



    <footer>
        <div class="footer">
            <div class="container">
                <div class="social-icon">
                    <div class="col-md-4">
                        <ul class="social-network">
                            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4">
                    <div class="copyright">
                        &copy; Company Amader ponno. All Rights Reserved.
                        <div class="credits">

                            Designed by <a href="https://sites.google.com/diu.edu.bd/absrakib/rakib">Abu Bakkar Siddik</a></div>
                    </div>
                </div>
            </div>
            <div class="pull-right">
                <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
            </div>
        </div>
    </footer>




    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/functions.js"></script>

</body>

</html>