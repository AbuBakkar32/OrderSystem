<?php

    include('Connection.php');

    $DeleteData=$_GET['Delete'];

    $Delete_Query="DELETE FROM customer WHERE cusId='$DeleteData'";
    $Execute=mysql_query($Delete_Query);
    
    if($Execute){
    header("location:ahome.php");
}
else{
	echo'<script>window.open("ahome.php?Deleted=Opps!!!! something wrong!!","_self")</script>';
}
?>
