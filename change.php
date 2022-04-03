<?php

include 'dbconnect.php';

$dltquery="TRUNCATE TABLE events";
if(mysqli_query($conn,$dltquery)){
    header('location:events.php');
}

?>