<?php
include('Connection.php');
session_start();
if(!isset($_SESSION['username'])){
header("location:login.php");
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
        <link rel="stylesheet" href="csss/all.css">
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
                                    <li role="presentation"><a href="order.php">Order</a></li>
                                    <li role="presentation" class=""><a href="product.php" class="active fa-spin">Product</a></li>
                                    <li role="presentation"><a href="contact.php">Contact</a></li>
                                    <li role="presentation"><a href="about.php">About Us</a></li>
                                    <li class="loginn"><a style="color:#FFFFFF;background-color:#3E8CCC" href="#"><?php echo $_SESSION['username'] ?></a></li>
                                    <li class="login logout" role="presentation"><a  href="logout.php">Log Out</a></li>
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
                                <input type="text" name="search" id="search" value="" placeholder="Search....." class="form-control">
                                <span class="input-group-btn buton">
                                    <input type="submit" name="commit" value="Search" class="btn btn-primary " data-disable-with="Search">
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        <div id="showIn" class="alert alert-dismissible alert-success mt-3" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Request Successfully Send</h4>
            <p class="mb-0">Your Request Sent To The Admin! <a href="product.php" style="color: red">Refresh</a> </p>
        </div>

            <div>
                <div class="row ">
                    <div class=" col-12 col-md-4 col-sm-3 col-lg-12 mt-5">
                        <h2 class="text-center  animated fadeInDown" style="font-weight: 600; padding: 15px;">Product Lists</h2>
                        <table class="table table-hover table-bordered animated fadeInDown" style="width: 80%;color: black;margin-left: 100px; padding: 10px;">
                            <thead>
                                <tr>
                                    <th>Product Id</th>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Quality</th>
                                    <th scope="col">Unit Price</th>
                                    
                                </tr>
                            </thead>
                            <?php
                            include('Connection.php');
                            
                            if(isset($_POST["commit"])){
                            $Name=$_POST["search"];        /*This code Only for search the Table Data in many ways*/
                            $ViewQuery="SELECT * FROM product WHERE CONCAT(productId,productName,brandName,quality,unitPrice) LIKE '%".$Name."%'";
                            $Execute=mysql_query($ViewQuery);
                            }
                            else{
                            $ViewQuery="SELECT * FROM product";
                            $Execute=mysql_query($ViewQuery);       /*This code for view all data in a table*/
                            }
                            ?>
                            <?php
                            include('Connection.php');
                            while($DataRows=mysql_fetch_array($Execute)):?>
                            <!-- It will fetch all data from database until it false-->
                            <tr class="">
                                <td><?php echo $DataRows['productId']; ?></td>
                                <td><?php echo $DataRows['productName']; ?></td>
                                <td><?php echo $DataRows['brandName']; ?></td>
                                <td><?php echo $DataRows['quality']; ?></td>
                                <td><?php echo $DataRows['unitPrice']; ?></td>
                                <td><a href="#" style="color: green" onclick="productConfirm()">Request For Order</a></td>
                            </tr>
                            <?php endwhile;?>
                        </table>
                    </div>
                </div>
            </div>
            <footer class="navbar-fixed-bottom">
                <div class="footer">
                    <div class="container">
                        <div class="social-icon">
                            <div class="col-md-4">
                                <ul class="social-network">
                                    <li><a href="https://www.facebook.com/Abubakkar32" target="_blank" class="fb tool-tip" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/engineer_rakib" class="twitter tool-tip" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://plus.google.com/u/0/+ABSRAKIB" target="_blank" class="gplus tool-tip" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
                                    <li><a href="#" class="linkedin tool-tip" target="_blank" title="Linkedin"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UC2596lWzE_7Yu4I9YCT8W2Q" target="_blank" class="ytube tool-tip" title="You Tube"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-offset-4">
                            <div class="copyright">
                                &copy; Company Amar Ponno. All Rights Reserved.
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
 function productConfirm(){
    var a=document.getElementById('showIn');
    if(a.style.display="none"){
            a.style.display="block";
        windows.location.href="product.php";
    }
          }
</script>
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/wow.min.js"></script>
                <script src="js/functions.js"></script>
                <script src="jss/all.js"></script>
            </body>
        </html>