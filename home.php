<?php
include('Connection.php');
session_start();
 $name=$_SESSION['username'];
 if(!isset($_SESSION['username'])){
    header("location:login.php");
 }
$query=mysql_query("select * from customer where cusName='$name' ");

 while($Row=mysql_fetch_array($query)){
 $gender=$Row['gender'];
 $address=$Row['address'];
 $country=$Row['country'];
 $phone=$Row['phone'];
 $mail=$Row['mail'];
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
                            <a href="home.php">
                                <h1 class="animated fadeInLeft slower"><span>Amader</span>Panno</h1>
                            </a>
                        </div>
                    </div>

                    <div class="navbar-collapse collapse">
                        <div class="menu">
                            <ul class="nav nav-tabs " role="tablist">
                                <li role="presentation" class=""><a href="home.php" class="active fa-spin">Home</a></li>
                                <li role="presentation"><a href="order.php">Order</a></li>
                                <li role="presentation"><a href="product.php">Product</a></li>
                                <li role="presentation"><a href="contact.php">Contact</a></li>
                                <li role="presentation"><a href="about.php">About Us</a></li>
                                <li class="loginn"><a style="color:#FFFFFF;background-color:#3E8CCC" href="#"><?php echo $_SESSION['username'] ?></a></li>
                                <li class="login" role="presentation"><a href="logout.php">LogOut</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section id="main-slider" class="no-margin ">
        <div class="carousel slide">
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/g1.gif); height: 550px;">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content  profile">
                                    <p class="animated fadeInLeft slower">My Profile</p>
                                    <div class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay=".3s">
                                    <lebel class="lebel">Name: </lebel>
                                    <lebel><?php echo $name;?></lebel>
                                    </div>
                                    <div class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay=".6s">
                                    <lebel class="lebel">Gender: </lebel>
                                    <lebel><?php echo $gender;?></lebel>
                                    </div>
                                    <div class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay=".9s">
                                    <lebel class="lebel">Address: </lebel>
                                    <lebel><?php echo $address;?></lebel>
                                    </div>
                                    <div class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1.2s">
                                    <lebel class="lebel">Country: </lebel>
                                    <lebel><?php echo $country;?></lebel>
                                    </div>
                                    <div class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1.5s">
                                    <lebel class="lebel">Phone: </lebel>
                                    <lebel><?php echo $phone;?></lebel>
                                    </div>
                                    <div class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1.8s">
                                    <lebel class="lebel">E-Mail:</lebel>
                                    <lebel><?php echo $mail;?></lebel>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs  animated fadeInRight slower">
                                <div class="slider-img ">
                                    <img src="images/slider/img10.png" class="img-responsive" style="width: 420px">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer>
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