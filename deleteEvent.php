<?php
    include 'header.php';
    include 'dbconnect.php';
    if(isset($_REQUEST['dlt'])){
        $id = $_REQUEST['dlt'];
    
        $yourEvent = "SELECT * FROM events WHERE eventID=$id";
        $run = mysqli_query($conn, $yourEvent);
        $row=mysqli_fetch_array($run);
        $eventID=$row['eventID'];
        if($eventID == ""){
            echo 'Error occured!';
        }
    }
    $queryUpdate="UPDATE `events` SET `eventStatus`=0 WHERE `eventID`=$id";
        $run = mysqli_query($conn,$queryUpdate);
        if($run){
            header('location:events.php');
        }
            
?>
