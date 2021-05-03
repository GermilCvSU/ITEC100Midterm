<?php
    session_start();
    $_SESSION['loginstatus']="enabled";

    $host="localhost";
    $user="root";
    $pass="";
    $db="login";

    $con=mysqli_connect($host,$user,$pass,$db);

    if($con)
    {

        $query="select code,status from auth_code where user_id='".$_SESSION['open_user_id']."' and code='".$_POST['auth']."';";// select code where id = user(id)
        $resultset=mysqli_query($con,$query);
        $rowcount=mysqli_num_rows($resultset);
        if($rowcount>0)// to confirm if some record exists
        {
            $result=mysqli_fetch_row($resultset);
            $code=$result[0];
            $status=$result[1];

            if(isset($_POST["auth"])==$code)// if input and the record match
            {
                if($status=="active")
                {
                    // event_log:successful authentication
                    include "log_event.php";// insert activity in the event_log table from login database in mysql
                    logEvent("Successful Authentication",$_SESSION['open_user_id']);// successful verification
                    // end of event_log:successful authentication

                    echo "
                    <html>
                        <head>
                            <title>Successful Verification</title>
                        </head>

                        <body><center>
                            <div id='container'>
                                <form method='POST' action=''>
                                    <p id='verification'>Verification Successful!</p>
                                    <button id='logoutbtn' onclick='logout()'>Log Out</button>
                                </form>
                            </div>

                            <script>
                                function logout()
                                {
                                    window.location.href='logout.php';
                                }
                            </script>

                            <style>
                                #container
                                {
                                    margin-top:20%;
                                }

                                #verification
                                {
                                    font-size:45px;
                                }

                                #logoutbtn
                                {
                                    font-size:28px;
                                }
                            </style>
                        </body>
                    </html>
                    ";
                }
                else
                {
                    echo ("<script>alert('Code Expired');window.location.href='index.php';</script>");
                }
            }
            elseif(isset($_POST["auth"])=="")
            {
                echo ("<script>alert('No Input');</script>");
                echo ("<script>window.location.href='index.php';</script>");
                $_SESSION['loginstatus']="disabled";
            }
        }
        else
        {
            echo("<script>alert('Wrong Code');</script>");
            include 'authentication.html';
        }
    }
    else
    {
        echo "Connection Failed";
    }
?>