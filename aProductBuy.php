<?php
include('Connection.php'); /* This is the Connection of Database*/
session_start();
if(!isset($_SESSION['username'])){     /*if no Session Create it will be Log into the Login Panel*/
header("location:alogin.php");
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
                                    <li role="presentation" class=""><a href="ahome.php" >Home</a></li>
                                    <li role="presentation"><a href="aorder.php">Order</a></li>
                                    <li role="presentation"><a href="aproduct.php">Product</a></li>
                                    <li role="presentation"><a href="aProductBuy.php" class="active animated shake slower">Sell Product</a></li>
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
                                    <input type="submit" name="commit" value="Search" class="btn btn-primary " data-disable-with="Search">
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="tabledetails">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 mt-5">
                        <h2 class="text-center" style="font-weight: 700; padding: 15px;">Total Sell Product </h2>
                        <hr>
                        <table class="table table-hover table-bordered animated fadeInDown" style="width: 80%;color: black;margin-left: 100px; padding: 10px;">
                            <thead>
                                <tr>
                                    <th>Customer Id</th>
                                    <th>Customer Name</th>
                                    <th scope="col">Customer Address</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Totall Cost</th>
                                </tr>
                            </thead>
                            <?php
                            include('Connection.php');
                            
                            if(isset($_POST["commit"])){
                            $Name=$_POST["search"];        /*This code Only for search the Table Data in many ways*/

                            $ViewQuery="SELECT customer.cusId,customer.cusName,customer.address,customer.phone,product.productName,product.unitPrice,orderdtails.quantity,product.unitPrice*orderdtails.quantity AS TotalCost
                            FROM customer,product,orders,orderDtails
                            WHERE customer.cusId=orders.cusId and product.productId=orderDtails.productId and customer.cusId LIKE '%$Name%'
                            UNION
                            SELECT customer.cusId,customer.cusName,customer.address,customer.phone,product.productName,product.unitPrice,orderdtails.quantity,product.unitPrice*orderdtails.quantity AS TotalCost
                            FROM customer,product,orders,orderDtails
                            WHERE customer.cusId=orders.cusId and product.productId=orderDtails.productId and customer.cusId LIKE '%$Name%'";
                            $Execute=mysql_query($ViewQuery);
                            }

                            else{
                            $ViewQuery="SELECT customer.cusId,customer.cusName,customer.address,customer.phone,product.productName,product.unitPrice,orderdtails.quantity,product.unitPrice*orderdtails.quantity AS TotalCost
                            FROM customer,product,orders,orderDtails
                            WHERE customer.cusId=orders.cusId and product.productId=orderDtails.productId
                            UNION
                            SELECT customer.cusId,customer.cusName,customer.address,customer.phone,product.productName,product.unitPrice,orderdtails.quantity,product.unitPrice*orderdtails.quantity AS TotalCost
                            FROM customer,product,orders,orderDtails
                            WHERE customer.cusId=orders.cusId and product.productId=orderDtails.productId";
                            $Execute=mysql_query($ViewQuery);       /*This code for view all data in a table*/
                            }
                            ?>

                            <?php
                            include('Connection.php');
                            while($DataRows=mysql_fetch_array($Execute)):?> <!-- It will fetch all data from database until it false-->

                            <tr>
                                <td><?php echo $DataRows['cusId']; ?></td>
                                <td><?php echo $DataRows['cusName']; ?></td>
                                <td><?php echo $DataRows['address']; ?></td>
                                <td><?php echo $DataRows['phone']; ?></td>
                                <td><?php echo $DataRows['productName']; ?></td>  <!--It can fill the all data into the table-->
                                <td><?php echo $DataRows['unitPrice']; ?></td>
                                <td><?php echo $DataRows['quantity']; ?></td>
                                <td><?php echo $DataRows['TotalCost']; ?></td>
                            </tr>
                            
                            <?php endwhile; ?>
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