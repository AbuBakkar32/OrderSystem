<?php
if(isset($_POST["submit"])){
$cid=$_POST["firstName"];
$cname=$_POST["lastName"];
$password=$_POST["password"];
$gender=$_POST["gender"];
$country=$_POST["country"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$Connection=mysql_connect('localhost','root','');
$Selected=mysql_select_db('ordermanagement',$Connection);
$query=mysql_query("INSERT INTO customer(cusId,cusName,password,gender,country,address,phone,mail) VALUES('$cid','$cname','$password','$gender','$country','$address','$phone','$email')");
if($query){
header("location:login.php");
echo'<script>alert("Successfully Inserted!");</script>';
}
else{
echo "Opps! something Wrong";
}

}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="css/login.css"/>
    </head>
    <body class="form-v4">
        <div class="page-content">
            <div class="form-v4-content">
                <form class="form-detail" action="registration.php" method="post" id="myform">
                    <h2 style="text-align: center;">REGISTER FORM</h2>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            <label>Your Id</label>
                            <input type="text" name="firstName" id="first_Name" class="input-text" onblur="valid()">
                            <p id="pera" style="display: none; color: red; margin-top: -20px; font-size: 13px;"></p>
                        </div>
                        <div class="form-row form-row-1">
                            <label>Your Name</label>
                            <input type="text" name="lastName" id="last_Name" class="input-text" onblur="valid1()">
                            <p id="lastn" style="display: none; color: red; margin-top:-20px;font-size: 13px;"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1">
                            <label>Country</label>
                            <select name="country">
                                <option name="India"   value="India">India</option>
                                <option name="England"   value="England">England</option>
                                <option name="Australia"   value="Australia">Australia</option>
                                <option name="Bangladesh"   value="Bangladesh">Bangladesh</option>
                                <option name="New-Zealend"   value="New-Zealend">New-Zealend</option>
                                <option name="Russia"   value="Russia">Russia</option>
                                <option name="Chine"   value="Chine">Chine</option>
                                <option name="America"   value="America">America</option>
                            </select>
                        </div>
                        <div class="form-row form-row-1">
                            <label>Gender</label>
                            <select name="gender" id="last_name" >
                                <option name="Male"   value="Male">Male</option>
                                <option name="Female"   value="Female">Female</option>
                                <option name="Others"   value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row form-row-1">
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="input-text" onblur="valid2()">
                        <p id="addres" style="display: none; color: red; margin-top:-20px;font-size: 13px;"></p>
                    </div>
                    <div class="form-row">
                        <label>Phone</label>
                        <input type="text" name="phone" id="phone" class="input-text" onblur="valid3()">
                        <p id="phon" style="display: none; color: red; margin-top:-20px;font-size: 13px;"></p>
                    </div>
                    <div class="form-row">
                        <label>Your Email</label>
                        <input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" onblur="ValidateEmail()">
                        <p id="eml" style="display: none; color: red; margin-top:-20px;font-size: 13px;"></p>
                    </div>
                    <div class="form-group">
                        <div class="form-row form-row-1 ">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="input-text" required onblur=" ValidatePassword()">
                            <p id="pass" style="display: none; color: red; margin-top:-20px;font-size: 13px;"></p>
                        </div>
                        <div class="form-row form-row-1">
                            <label>Comfirm Password</label>
                            <input type="password" name="comfirm_password" id="comfirm_password" class="input-text"  required onblur="validconfirmpass()">
                            <p id="cpass" style="display: none; color: red; margin-top:-20px;font-size: 13px;"></p>
                        </div>
                    </div>
                    <div class="form-checkbox">
                        <label class="container">
                            <p>I agree to the <a href="#" class="text">Terms and Conditions</a></p>
                            <input type="checkbox" name="checkbox" id="reg" onclick="myFunction()">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    
                    <input type="Submit" name="submit" class="register" value="Register" id="ok" style="display: none;">
                </form>
            </div>
        </div>
        <!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>-->
        <script>
        function myFunction() {
        if(document.getElementById('reg').checked==true)
        {
        document.getElementById("ok").disabled = false;
        document.getElementById('ok').style.display="block";
        }
        if(document.getElementById('reg').checked==false)
        {
        document.getElementById('ok').disabled=true;
        document.getElementById('ok').style.display="none";
        }
        }
        function valid(){
        if(document.getElementById('first_Name').value==""){
        document.getElementById('pera').style.display="block";
        document.getElementById('pera').innerHTML="Please enter your ID (ex:101,id100)";
        }
        else{
        document.getElementById('pera').style.display="none";
        }
        }
        function valid1(){
        if(document.getElementById('last_Name').value==""){
        document.getElementById('lastn').style.display="block";
        document.getElementById('lastn').innerHTML="Please enter your Name (ex:Abu Bakkar Siddik)";
        }
        else{
        document.getElementById('lastn').style.display="none";
        }
        }
        function valid2(){
        if(document.getElementById('address').value==""){
        document.getElementById('addres').style.display="block";
        document.getElementById('addres').innerHTML="Please Provide your valid Address (ex:12/A/1, dhanmondhi, dhaka)";
        }
        else{
        document.getElementById('addres').style.display="none";
        }
        }
        function valid3(){
        if(document.getElementById('phone').value=="" || document.getElementById('phone').value.length <11){
        document.getElementById('phon').style.display="block";
        document.getElementById('phon').innerHTML="Should be a number or not empty and length must be =>11 (ex:01689040992)";
        }
        else{
        document.getElementById('phon').style.display="none";
        }
        }
        function ValidateEmail(){
        var a=document.getElementById("your_email").value;
        var regrxp=/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/;
        if (regrxp.test(a)){
        document.getElementById('eml').style.display="none";
        }
        else{
            document.getElementById('eml').style.display="block";
        document.getElementById('eml').innerHTML="Provide your correct E-mail(ex:abubakkarsiddik32@hotmail.com)";
        }
        }
        function ValidatePassword(){
        var a=document.getElementById("password").value;
        var regrxp=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,8}$/;
        if (regrxp.test(a)){
        document.getElementById('pass').style.display="none";
        }
        else{
        document.getElementById('pass').style.display="block";
        document.getElementById('pass').innerHTML="Provide your correct password(ex:asD1 | asDF1234 | ASPgo123)";
        }
        }
        function validconfirmpass(){
        var a=document.getElementById("password").value;
        var b=document.getElementById("comfirm_password").value;
        if(a!=b){
        document.getElementById('cpass').style.display="block";
        document.getElementById('cpass').style.color="red";
        document.getElementById('cpass').innerHTML="**Should be Same**";
        }
        else{
        document.getElementById('cpass').style.display="block";
        document.getElementById('cpass').style.color="green";
        document.getElementById('cpass').innerHTML="Password Matched!";   
        }
        }
        
        </script>
    </body>
</html>