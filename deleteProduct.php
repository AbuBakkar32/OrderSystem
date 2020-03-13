<?php

    include('Connection.php');

    $DeleteData=$_GET['Delete'];

    $Delete_Query="DELETE FROM product WHERE productId='$DeleteData'";
    $Execute=mysql_query($Delete_Query);
    
    if($Execute){
    header("location:aproduct.php");
}
else{
	echo'<script>window.open("aproduct.php?Deleted=Opps!!!! something wrong!!","_self")</script>';
}
?>