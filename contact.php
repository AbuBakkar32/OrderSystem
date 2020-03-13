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
    <link href="css/style1.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>


<body>

    <header>
        <nav class="navbar navbar-default navbar-fixed-top navi" role="navigation ">
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
                                <li role="presentation"><a href="product.php">Product</a></li>
                                <li role="presentation" class=""><a href="contact.php" class="active fa-spin">Contact</a></li>
                                <li role="presentation"><a href="about.php">About Us</a></li>
                                <li class="loginn"><a style="color:#FFFFFF;background-color:#3E8CCC" href="#"><?php echo $_SESSION['username'] ?></a></li>
                                <li class="login" role="presentation"><a href="logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div </nav> 
            </header> 

            <section id="contact-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="block">
                                <h2 class="subtitle wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Contact With Me</h2>
                                <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                                    
                                </p>
                                <div class="contact-form">
                                    <form id="contact-form" method="#" action="#" role="form">

                                        <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                                            <input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
                                        </div>

                                        <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".8s">
                                            <input type="email" placeholder="Your Email" class="form-control" name="email" id="email">
                                        </div>

                                        <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1s">
                                            <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
                                        </div>

                                        <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.2s">
                                            <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>
                                        </div>

                                        <div id="success" class="success">
                                            Thank you. The Mailman is on His Way :)
                                        </div>

                                        <div id="error" class="error">
                                            Sorry, don't know what happened. Try later :(
                                        </div>

                                        <div id="submit" class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.4s">
                                            <input type="submit" id="contact-submit" class="btn btn-success btn-send" value="Send Message">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="map-area">
                                <h2 class="subtitle  wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Find Us</h2>
                                <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                                   

                                </p>
                                <div class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.277552998015!2d90.3678744!3d23.773128800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0ae4adf3cb9%3A0x7f2cf443b764e4a4!2sShishu+Mela!5e0!3m2!1sen!2s!4v1435516022247" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
                                    <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Hey, Our Respected Coustomer hope you are very well today.Thank you to visit our site and i think you buy any product which is more neccessary for you.If you have any query or suggestion please Contact with our Team</p>
                                    <a href="#contact" class="btn btn-default btn-contact wow fadeInDown scrolldown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr>

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


    <script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/functions.js"></script>

</body>

</html>