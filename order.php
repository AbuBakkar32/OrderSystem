<?php
include('Connection.php');
session_start();
if(!isset($_SESSION['username'])){
header("location:login.php");
}
$id="";
$order_id="";
$pro_id="";
$qnt="";
$UpdateRecord=$_GET['UpdateData'];
$Show_Query="SELECT * FROM orderdtails WHERE id='$UpdateRecord'";
$Execute=mysql_query($Show_Query);
while($DataRows=mysql_fetch_array($Execute)){
$id=$DataRows['id'];
$order_id=$DataRows['orderId'];
$pro_id=$DataRows['productId'];  /*When we Click on Update button The input field automatic will be fill*/
$qnt=$DataRows['quantity'];
}
if(isset($_POST["submited"])){
$id=$_POST["id"];
$oid=$_POST["oid"];
$pid=$_POST["pid"];  /* This Code Only for Update the database */
$qnt=$_POST["qnt"];
$query=mysql_query("UPDATE  orderdtails SET orderId='$oid', productId='$pid', quantity='$qnt' WHERE id='$id'");
if($query){
header("location:order.php");
echo'<script>alert("Successfully Updated!");</script>';
}
else{
echo'<script>alert("Oops!Try Again Please");</script>';
}
}
if(isset($_POST["submit"])){
$oid=$_POST["oid"];
$pid=$_POST["pid"];
$qnt=$_POST["qnt"];
$query=mysql_query("INSERT INTO orderdtails(id,orderId,productId,quantity) VALUES('','$oid','$pid','$qnt')");
if($query){
header("location:order.php");
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
                                <a href="home.php">
                                    <h1 class=""><span>Amader</span>Panno</h1>
                                </a>
                            </div>
                        </div>
                        <div class="navbar-collapse collapse">
                            <div class="menu">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="home.php">Home</a></li>
                                    <li role="presentation" class=""><a href="order.php" class="active fa-spin">Order</a></li>
                                    <li role="presentation"><a href="product.php">Product</a></li>
                                    <li role="presentation"><a href="contact.php">Contact</a></li>
                                    <li role="presentation"><a href="about.php">About Us</a></li>
                                    <li class="loginn"><a style="color:#FFFFFF;background-color:#3E8CCC" href="#"><?php echo $_SESSION['username'] ?></a></li>
                                    <li class="login" role="presentation"><a href="logout.php">Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="services tabledetails" style="background-color: ">
            <div class="container">
                <div class="row">
                    <h2>Order</h2>
                    <hr>
                    <div class="col-md-4">
                        <h2 class="animated fadeInLeft" style="font-weight: 600;text-align: center;margin-left: 70px; padding-bottom:20px;"> Request For Order</h2>
                    </div>
                    <div class="col-md-4">
                        <h2 class="animated fadeInDown" style="font-weight: 600;text-align: center;margin-left: -20px; padding-bottom:20px;"> Order Details</h2>
                    </div>
                    <div class="col-md-4">
                        <h2 class="animated fadeInRight" style="font-weight: 600;text-align: center;margin-left: -20px; padding-bottom:20px;"> Order Place</h2>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-4 orderform">
                        <div class="mainform">
                            <form action="order.php" method="post">
                                <table class="animated fadeInLeft">
                                    <div>
                                        <tr style="display: none;">
                                            <td>
                                                <lebel class="lebel" style="color:black">ID</lebel>
                                            </td>
                                            <td><input type="text" name="id" value="<?php echo $id;?>" placeholder="Order ID"></td>
                                        </tr>
                                    </div>
                                    <div>
                                        <tr>
                                            <td>
                                                <lebel class="lebel" style="color:black">Order ID</lebel>
                                            </td>
                                            <td><input type="text" name="oid" value="<?php echo $order_id;?>" placeholder="Order ID"></td>
                                        </tr>
                                    </div>
                                    <div>
                                        <tr>
                                            <td>
                                                <lebel class="lebel" style="color:black">Product ID</lebel>
                                            </td>
                                            <td><input type="text" name="pid" value="<?php echo $pro_id;?>" placeholder="Product ID"></td>
                                        </tr>
                                    </div>
                                    <div>
                                        <tr>
                                            <td>
                                                <lebel class="lebel" style="color:black">Quantity</lebel>
                                            </td>
                                            <td><input type="text" name="qnt" value="<?php echo $qnt ;?>" placeholder="Quantity"></td>
                                        </tr>
                                    </div>
                                    <tr>
                                        <td><button class="buttonn" name="submit"><a href="">Save</a></button></td>
                                        <td><button class="buttonn" name="submited"><a href="">Update</a></button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-4 mt-5 orderdtails">
                        <table class="table table-hover table-bordered animated flip " style="width: 80%;color: black;margin-left: 100px; padding: 10px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="display: none">ID</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product ID</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <?php
                            include('Connection.php');
                            
                            if(isset($_POST["commit"])){
                            $Name=$_POST["search"];        /*This code Only for search the Table Data in many ways*/
                            
                            $ViewQuery="SELECT * FROM orderdtails WHERE CONCAT(orderId,productId,quantity) LIKE '%".$Name."%'";
                            $Execute=mysql_query($ViewQuery);
                            }else{
                            $ViewQuery="SELECT * FROM orderdtails";
                            $Execute=mysql_query($ViewQuery);       /*This code for view all data in a table*/
                            }
                            ?>
                            <?php
                            include('Connection.php');
                            while($DataRows=mysql_fetch_array($Execute)):?> <!-- It will fetch all data from database until it false-->
                            <tr>
                                <td style="display: none"><?php echo $DataRows['id']; ?></td>
                                <td><?php echo $DataRows['orderId']; ?></td>
                                <td><?php echo $DataRows['productId']; ?></td>
                                <td><?php echo $DataRows['quantity']; ?></td>
                                <td><a href="deleteOrders.php? Delete=<?php echo $DataRows['id']; ?>" style="color: red">Delete</a></td>
                                <td><a href="order.php? UpdateData=<?php echo $DataRows['id']; ?>" style="color: green">Update</a></td>
                            </tr>
                            <?php endwhile;?>
                        </table>
                    </div>
                    <div class="  col-md-12 col-sm-12 col-lg-4 mt-5 orderplace">
                        <table class="table table-hover table-bordered animated fadeInRight">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th scope="col">Customer ID</th>
                                    <th scope="col" onclick="Delete()">Delete</th>
                                    <th scope="col" onclick="Update()">Update</th>
                                </tr>
                            </thead>
                            
                            <?php
                            include('Connection.php');
                            $SID=$_SESSION['id'];       /*This code Only for search the Table Data in many ways*/
                            
                            $ViewQuery="SELECT orderId, customer.cusId FROM orders,customer WHERE customer.cusId=orders.cusId AND customer.cusId='$SID'";
                            $Execute=mysql_query($ViewQuery);       /*This code for view all data in a table*/
                            include('Connection.php');
                            while($DataRows=mysql_fetch_array($Execute)){
                            ?> <!-- It will fetch all data from database until it false-->
                            <tr>
                                <td><?php echo $DataRows['orderId']; ?></td>
                                <td><?php echo $DataRows['cusId']; ?></td>
                                <td><a href=" " style="color: red"   onclick="Delete()">Delete</a></td>
                                <td><a href=" " style="color: green" onclick="Update()">Update</a></td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
                </div>
                <!-- <div class="row">
                    <hr>
                    <div class="col-md-6">
                        <h2 class="" style="font-weight: 600;text-align: center;margin-left: 70px; padding-bottom:20px;"> Request For Order</h2>
                    </div>
                    <div class="col-md-6">
                        <h2 class="" style="font-weight: 600;text-align: center;margin-left: 70px; padding-bottom:20px;"> Totall Order Send</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-6 mt-5 inputform">
                        <div class="mainform">
                            <form action="aorder.php" method="post">
                                <table>
                                    <fieldset>
                                        <tr>
                                            <td>
                                                <lebel class="lebel" style="color:black">Order ID</lebel>
                                            </td>
                                            <td><input type="text" name="firstName" value="<?php echo $order_id; ?>" placeholder="Order ID"></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <lebel class="lebel" style="color:black">Customer ID</lebel>
                                            </td>
                                            <td><input type="text" name="lastName" value="<?php echo $cus_id; ?>" placeholder="Customer ID"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><button class="buttonn" name="submit"><a href="">Save</a></button></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><button class="buttonn" name="submited"><a href="">Update</a></button></td>
                                        </tr>
                                    </fieldset>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-6 mt-5 inputform">
                        <table class="table table-hover " style="width: 80%;color: black;margin-left: 100px; padding: 10px;">
                            <thead>
                                <tr>
                                    <th scope="col">Customer ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td>1994</td>
                                    <td>AbuBakkar Siddik</td>
                                    <td>Order100</td>
                                    <td scope="col"><a href="Delete" style="color: red">Delete</a></td>
                                    <td scope="col"><a href="Delete" style="color: darkturquoise">Update</a></td>
                                </tr>
                                <tr class="">
                                    <td>1994</td>
                                    <td>AbuBakkar Siddik</td>
                                    <td>Order100</td>
                                    <td scope="col"><a href="Delete" style="color: red">Delete</a></td>
                                    <td scope="col"><a href="Delete" style="color: darkturquoise">Update</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>-->
                <hr>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 mt-5 inputform">
                        <h2 class="text-center  " style="font-weight: 600; padding: 15px;">Oder History</h2>
                        <table class="table table-hover animated fadeInRight slower" style="width: 80%;color: black;margin-left: 100px; padding: 10px;">
                            <thead>
                                <tr>
                                    <th scope="col">Customer ID</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                </tr>
                            </thead>
                            
                            <?php
                            include('Connection.php');
                            $SID=$_SESSION['id'];
                            $ViewQuery="SELECT customer.cusId,customer.cusName,orders.orderId,product.productName,orderdtails.quantity FROM customer,orders,product,orderdtails WHERE orders.orderId=orderdtails.orderId and product.productId=orderdtails.productId and customer.cusId='$SID' UNION SELECT customer.cusId,customer.cusName,orders.orderId,product.productName,orderdtails.quantity FROM customer,orders,product,orderdtails WHERE orders.orderId=orderdtails.orderId and product.productId=orderdtails.productId and customer.cusId='$SID' ";
                            $Execute=mysql_query($ViewQuery);       /*This code for view all data in a table*/
                            while($DataRows=mysql_fetch_array($Execute)){
                            // It will fetch all data from database until it false
                            ?>
                            <tr>
                                <td><?php echo $DataRows['cusId']; ?></td>
                                <td><?php echo $DataRows['cusName']; ?></td>
                                <td><?php echo $DataRows['orderId']; ?></td>
                                <td><?php echo $DataRows['productName']; ?></td>
                                <td><?php echo $DataRows['quantity']; ?></td>
                            </tr>
                            <?php }?>
                        </table>
                    </div>
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
            <script>
            function Delete(){
            alert("You don't have permission to Delete");
            }
            function Update(){
            alert("You don't have permission to Update");
            }
            </script>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/wow.min.js"></script>
            <script src="js/functions.js"></script>
        </body>
    </html>