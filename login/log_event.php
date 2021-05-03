<?php
    function logEvent($activity,$user_id)// use this function to input log in 'event' table in 'login' database.
    {
        include "logindb_connect.php";

        date_default_timezone_set("Asia/Manila");
        $datetime=date('Y-m-d h:i:s'); // current time when activity was occurred
        /* db:login
           table:event_log
        +-----------+-------------+------+-----+---------+----------------+
        | Field     | Type        | Null | Key | Default | Extra          |
        +-----------+-------------+------+-----+---------+----------------+
        | event_id  | int(11)     | NO   | PRI | NULL    | auto_increment |
        | activity  | varchar(80) | YES  |     | NULL    |                |
        | user_id   | int(11)     | YES  |     | NULL    |                |
        | date_time | varchar(30) | YES  |     | NULL    |                |
        +-----------+-------------+------+-----+---------+----------------+
        */

        // event_log activities could be: login, successfull authentication, failed authentication, logout

        $query = "INSERT INTO event_log(activity, user_id, date_time) VALUES('".$activity."',".$user_id.",'".$datetime."');";
        mysqli_query($con,$query);// $con is from logindb_connect.php
    }
?>