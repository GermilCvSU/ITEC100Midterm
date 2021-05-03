<?php
    session_start();

    // event_log: logout
    include 'log_event.php';// insert activity in the event_log table from login database in mysql
    logEvent('Logout',$_SESSION['open_user_id']);// logout
    // end of event_log: logout

    include "index.php";
?>