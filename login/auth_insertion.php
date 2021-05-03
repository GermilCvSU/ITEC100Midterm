<?php
    session_start();

    $host="localhost";
    $user="root";
    $pass="";
    $db="login";
    $con=mysqli_connect($host,$user,$pass,$db);

    if($con)
    {
        $query4="insert into auth_code(user_id, code, created, expiration) values('".$_SESSION['open_user_id']."','".$_SESSION['code']."','".$_POST['created']."','".$_POST['expiration']."');";
	    mysqli_query($con,$query4);
    }
    else
    {
        echo "Connection error";
    }
    
?>