<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link rel="stylesheet" href="">
</head>

<body>
  <?php
    
    $Connection=mysql_connect('localhost','root','');
    if(!$Connection){
        echo "Database not Connected <br>";
    }
    $Selected=mysql_select_db('ordermanagement',$Connection);
     if(!$Selected){
        echo "Database not Selected";
    }
   
    
    ?> 
    
</body>
</html>
