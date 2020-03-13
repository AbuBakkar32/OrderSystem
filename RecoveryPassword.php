<?php
include('Connection.php');

$name="";

if(isset($_POST["Submit"])){
    $email=$_POST['mail'];
    $query=mysql_query("SELECT * FROM customer WHERE mail='$email'");
    $count=mysql_num_rows($query);
    $row=mysql_fetch_array($query);
   
    if($count==1){    
      $name="Your Password is:- ".$row['password'];
    }
    else{
        echo '<script>
            alert("Please Insert Your Correct Email Address!");
            </script>';
    }
    
}

?>


<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/animationn.css">
    <link href="css/style1.css" rel="stylesheet" />
    <style>
      .buton {
    color: black;
    font-weight: 700;
    background-color: white;
    border: 2px solid black;
    text-align: center;
    border-top-left-radius: 18px;
    border-bottom-right-radius: 18px;
    padding-right: 50px;
    padding-left: 50px;
    margin-left:70px;
    height: 34px;
}
.buton:hover{
  color: red;
  padding-right: 40px;
  padding-left: 40px;
  transition: all 1.0s;
}
.back{
     color: black;
    background-color: white;
    border: 1px solid black;
    text-align: center;
    padding-right: 40px;
    padding-left: 40px;
    border-radius: 0px 25px 0px 25px;
    margin-left:5px;
    margin-top: 5px;
    font-weight: 800;
    font-size: 14px;
    height: 30px;
}
    </style>
</head>

<body>
  <button id="back" class="back" onmouseover="add()">Login</button>
   <div class="container" style="margin-top:100px; margin-left:40%; padding:10px;" >
       <form action="" method="post">
          <lebel name="name" style="color:purple; font-weight:700; font-size:15px; margin-left: 30px;  font-family: italic;letter-spacing:2px;"><?php echo $name; ?></lebel><br>
           <input type="email" name="mail" placeholder="Enter Your E-mail Address"><br>
           <input type="submit" class="buton" name="Submit" value="Submit"><br>
         
       </form>
   </div>
   
   <script>
       function add(){
           var c=window.location.href ="login.php";
           document.getElementById("back")=c;
       }
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/functions.js"></script>
</body>
</html>
