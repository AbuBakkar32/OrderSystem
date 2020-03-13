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
    <link href="css/animationn.css" rel="stylesheet" />
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/style1.css" rel="stylesheet" />

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
                                <li role="presentation"><a href="home.php">Home</a></li>
                                <li role="presentation"><a href="order.php">Order</a></li>
                                <li role="presentation"><a href="product.php">Product</a></li>
                                <li role="presentation"><a href="contact.php">Contact</a></li>
                                <li role="presentation" class=""><a href="about.php" class="active fa-spin">About Us</a></li>
                                <li class="loginn"><a style="color:#FFFFFF;background-color:#3E8CCC" href="#"><?php echo $_SESSION['username'] ?></a></li>
                                <li class="login" role="presentation"><a href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>About Us</li>
            </div>
        </div>
    </div>

    <div class="aboutus">
        <div class="container">
            <h3>Our company information</h3>
            <hr>
            <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="images/8.jpg" class="img-responsive">
                <h4>We Create, Design, Developer and Make it Real</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, sint, veniam! Dolor molestias nisi commodi, eos ad eveniet labore non quaerat, accusamus qui earum quisquam! Quas voluptas impedit, eum minus. </p>
                <p>In neque lectus, lobortis a varius a, hendrerit eget dolor. Fusce scelerisque, sem ut viverra sollicitudin, est turpis blandit lacus, in pretium lectus sapien at est. Integer pretium ipsum sit amet dui feugiat vitae dapibus odio eleifend.</p>
            </div>
            <div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="skill">
                    <h2>Our Skills</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                    <div class="progress-wrap">
                        <h3>Graphic Design</h3>
                        <div class="progress">
                            <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                <span class="bar-width">85%</span>
                            </div>

                        </div>
                    </div>

                    <div class="progress-wrap">
                        <h4>HTML CSS Bootstrap</h4>
                        <div class="progress">
                            <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                <span class="bar-width">95%</span>
                            </div>
                        </div>
                    </div>

                    <div class="progress-wrap">
                        <h4>Development</h4>
                        <div class="progress">
                            <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                <span class="bar-width">80%</span>
                            </div>
                        </div>
                    </div>

                    <div class="progress-wrap">
                        <h4>Wordpress</h4>
                        <div class="progress">
                            <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                <span class="bar-width">90%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="our-team ">
        <div class="container">
            <h3>Our Team</h3>
            <div class="text-center">
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="images/services/5.jpg" width="250px" height="250px" alt="">
                    <h4>Abu Bakkar Siddik</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
                </div>
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <img src="images/services/4.jpg" width="250px" height="250px" alt="">
                    <h4>Fahim Muntasir</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
                </div>
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <img src="images/services/6.jpg" width="250px" height="250px" alt="">
                    <h4>Nayeem Biswas</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing eil sed deiusmod tempor</p>
                </div>
            </div>
        </div>
    </div>

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