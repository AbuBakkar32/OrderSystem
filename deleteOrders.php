<?php

    include('Connection.php');

    $DeleteData=$_GET['Delete'];

    $Delete_Query="DELETE FROM orderdtails WHERE id='$DeleteData'";
    $Execute=mysql_query($Delete_Query);
    
    if($Execute){
    header("location:order.php");
}
else{
	echo'<script>window.open("order.php?Deleted=Opps!!!! something wrong!!","_self")</script>';
}
?>