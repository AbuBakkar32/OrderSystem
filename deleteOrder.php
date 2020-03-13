<?php

    include('Connection.php');

    $DeleteData=$_GET['Delete'];

    $Delete_Query="DELETE FROM orders WHERE orderId='$DeleteData'";
    $Execute=mysql_query($Delete_Query);
    
    if($Execute){
    header("location:aorder.php");
}
else{
	echo'<script>window.open("aorder.php?Deleted=Opps!!!! something wrong!!","_self")</script>';
}
?>