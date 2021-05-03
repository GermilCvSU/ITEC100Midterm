<?php
    session_start();

    $host="localhost";
    $user="root";
    $pass="";
    $db="login";

    $con=mysqli_connect($host,$user,$pass,$db);

    if($con)
    {
        $query="update auth_code set status='expired' where code='".$_SESSION['code']."';";
        mysqli_query($con,$query);
        print($_SESSION['code']);
        echo "<script>window.open('','_self').close();</script>";
    }

?>