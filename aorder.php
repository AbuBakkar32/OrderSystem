<?php
include('Connection.php');
session_start();

 if(!isset($_SESSION['username'])){
    header("location:alogin.php");
 }
     $order_id="";
     $cus_id="";

    include('Connection.php');

    $UpdateRecord=$_GET['Updates'];
    $Show_Query="SELECT * FROM orders WHERE orderId='$UpdateRecord'";
    $Execute=mysql_query($Show_Query);

 while($DataRows=mysql_fetch_array($Execute)){  
           $order_id=$DataRows['orderId'];
           $cus_id=$DataRows['cusId'];  /*When we Click on Update button The input field automatic will be fill*/          
 }

if(isset($_POST["submited"])){
$cid=$_POST["firstName"];
$cname=$_POST["lastName"];  /* This Code Only for Update the database */


$query=mysql_query("UPDATE  orders SET cusId='$cname' WHERE orderId='$cid'");

if($query){
header("location:aorder.php");
echo'<script>alert("Successfully Updated!");</script>';
}

else{
echo'<script>alert("Oops!Try Again Please");</script>';
 }
}



if(isset($_POST["submit"])){

$oid=$_POST["firstName"];
$cid=$_POST["lastName"];


$query=mysql_query("INSERT INTO orders(orderId,cusId) VALUES('$oid','$cid')");

if($query){
header("location:aorder.php");
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

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet"/>
    <link href="css/animationn.css" rel="stylesheet"/>

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
                                <h1 class=""><span>Amader</span>Panno</h1>
                            </a>
                        </div>
                    </div>

                    <div class="navbar-collapse collapse">
                        <div class="menu">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class=""><a href="ahome.php">Home</a></li>
                                <li role="presentation"><a href="aorder.php" class="active fa-spin">Order</a></li>
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

 <div class="tabledetails">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-6 mt-5 inputform">
                <div class="mainform">
                    <form action="aorder.php" method="post">
                        <table class="animated fadeInLeft ">
                            <fieldset>
                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black" >Order ID</lebel>
                                    </td>
                                    <td><input type="text" name="firstName"  value="<?php echo $order_id; ?>" placeholder="Order ID" hidden></td>
                                </tr>
                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Customer ID</lebel>
                                    </td>
                                    <td><input type="text" name="lastName" value="<?php echo $cus_id; ?>" placeholder="Customer ID"></td>
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

            <div class="  col-md-12 col-sm-12 col-lg-6 mt-5">
                <h2 class="text-center" style="font-weight: 700; padding: 15px;">Order Place</h2>
                <table class="table table-hover table-bordered animated fadeInRight">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th scope="col">Customer ID</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>

                        </tr>
                    </thead>
                    
 <?php
    include('Connection.php');
    
    if(isset($_POST["commit"])){   
    $Name=$_POST["search"];        /*This code Only for search the Table Data in many ways*/
    
    $ViewQuery="SELECT * FROM orders WHERE CONCAT(orderId,cusId) LIKE '%".$Name."%'";
    $Execute=mysql_query($ViewQuery);
}else{
       $ViewQuery="SELECT * FROM orders";
       $Execute=mysql_query($ViewQuery);       /*This code for view all data in a table*/
}

?>

<?php
       include('Connection.php');
       while($DataRows=mysql_fetch_array($Execute)):?> <!-- It will fetch all data from database until it false-->

                      <tr>
                        <td><?php echo $DataRows['orderId']; ?></td>
                        <td><?php echo $DataRows['cusId']; ?></td>
                        <td><a href="deleteOrder.php? Delete=<?php echo $DataRows['orderId']; ?>" style="color: red">Delete</a></td>
                        <td><a href="aorder.php? Updates=<?php echo $DataRows['orderId']; ?>" style="color: green">Update</a></td>
                    </tr>

                    <?php endwhile;?>
                </table>
            </div>
        </div>
    </div>


    <footer class="">
        <div class="footer">
            <div class="container">
                <div class="social-icon">
                    <div class="col-md-4">
                        <ul class="social-network">
                            <li><a href="https://www.facebook.com/Abubakkar32" target="_blank" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/engineer_rakib" class="twitter tool-tip" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://plus.google.com/u/0/+ABSRAKIB" target="_blank" class="gplus tool-tip" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="linkedin tool-tip" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UC2596lWzE_7Yu4I9YCT8W2Q" target="_blank" class="ytube tool-tip" title="You Tube"><i class="fa fa-youtube-play"></i></a></li>
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