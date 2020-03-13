<?php
include('Connection.php');
session_start();

 if(!isset($_SESSION['username'])){
    header("location:alogin.php");
 }

           $pId="";
           $pName="";
           $brand_name="";          /*First time input field Empty*/
           $quality="";
           $price="";

    include('Connection.php');

    $UpdateRecord=$_GET['Update'];
    $Show_Query="SELECT * FROM product WHERE productId='$UpdateRecord'";
    $Execute=mysql_query($Show_Query);

 while($DataRows=mysql_fetch_array($Execute)){  
           $pId=$DataRows['productId'];
           $pName=$DataRows['productName'];
           $brand_name=$DataRows['brandName'];  /*When we Click on Update button The input field automatic will be fill*/
           $quality=$DataRows['quality'];
           $price=$DataRows['unitPrice'];
 }


include('Connection.php');
if(isset($_POST["submit"])){

$ProductId=$_POST["pId"];
$ProductName=$_POST["pName"];
$BrandName=$_POST["brand_name"];       /*This is the Code for insert the value into the Database*/
$Quality=$_POST["quality"];
$UnitPrice=$_POST["price"];

$query=mysql_query("INSERT INTO product(productId,productName,brandName,quality,unitPrice) VALUES('$ProductId','$ProductName','$BrandName','$Quality','$UnitPrice')");

if($query){
header("location:aproduct.php");
echo'<script>alert("Successfully Inserted!");</script>';
}

else{
echo'<script>alert("Oops!Try Again Please");</script>';
}
}


if(isset($_POST["submited"])){

$ProductId=$_POST["pId"];
$ProductName=$_POST["pName"];
$BrandName=$_POST["brand_name"];       /* This Code Only for Update the database */
$Quality=$_POST["quality"];
$UnitPrice=$_POST["price"];

$query=mysql_query("UPDATE  product SET productName='$ProductName', brandName='$BrandName', quality='$Quality', unitPrice='$UnitPrice' WHERE productId='$ProductId'");

if($query){
header("location:aproduct.php");
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
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class=""><a href="ahome.php">Home</a></li>
                                <li role="presentation"><a href="aorder.php">Order</a></li>
                                <li role="presentation"><a href="aproduct.php" class="active fa-spin">Product</a></li>
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
                            <input type="text" name="search" id="search" value="" placeholder="Search product Details" class="form-control">
                            <span class="input-group-btn buton">
                                <input type="submit" name="commit" value="Search" class="btn btn-primary " data-disable-with="Search">
                            </span>
                        </div>
                    </form>
                </div>
            </div>
    </section>

    <div class="tabledetails">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-6 mt-5 inputform ">
                <div class="mainform">
                    <form action="aproduct.php" method="post">
                        <table class="animated fadeInLeft">
                            <fieldset>
                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Product ID</lebel>
                                    </td>
                                    <td><input type="text" name="pId" value="<?php echo $pId; ?>" placeholder="Product ID"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Product Name</lebel>
                                    </td>
                                    <td><input type="text" name="pName" value="<?php echo $pName; ?>" placeholder="Product Name"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Brand Name</lebel>
                                    </td>
                                    <td><input type="text" name="brand_name" value="<?php echo $brand_name; ?>" placeholder="Brand Name"></td>
                                </tr>


                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Quality</lebel>
                                    </td>
                                    <td><input type="text" name="quality" value="<?php echo $quality; ?>" placeholder="Quality"></td>
                                </tr>

                                <tr>
                                    <td>
                                        <lebel class="lebel" style="color:black">Unit price</lebel>
                                    </td>
                                    <td><input type="text" name="price" value="<?php echo $price; ?>" placeholder="Unit price"></td>
                                </tr>

                                <tr>
                                    <td><button class="buttonn" name="submit"><a href="aproduct.php">Save</a></button></td>
                                    <td><button class="buttonn" name="submited"><a href="aproduct.php">Update</a></button></td>
                                </tr>
                                
                            </fieldset>

                        </table>
                    </form>
                </div>
            </div>

            <div class="  col-md-12 col-sm-12 col-lg-6 mt-5">
                <h2 class="text-center animated fadeInRight" style="font-weight: 700; padding: 15px; margin-right:130px;">Product Details</h2>
                <table class="table table-hover table-bordered animated fadeInRight" style="width:75%;">
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Brand Name</th>
                            <th scope="col">Quality</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>

                    <?php
    include('Connection.php');
    
    if(isset($_POST["commit"])){   
    $Name=$_POST["search"];        /*This code Only for search the Table Data in many ways*/
    
    $ViewQuery="SELECT * FROM product WHERE CONCAT(productId,productName,brandName,quality,unitPrice) LIKE '%".$Name."%'";
    $Execute=mysql_query($ViewQuery);
}else{
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
                        <td><a href="deleteProduct.php? Delete=<?php echo $DataRows['productId']; ?>" style="color: red">Delete</a></td>
                        <td><a href="aproduct.php? Update=<?php echo $DataRows['productId']; ?>" style="color: green">Update</a></td>
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
