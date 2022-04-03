<?php
    
    $conn = mysqli_connect("localhost","root","","eventcal") or die("failed to connect");
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
    {

            header("location: login.php");
        
    }
    $user = $_SESSION['username'];
    $query = "SELECT `userID` FROM users WHERE username='$user'";
    $run=mysqli_query($conn,$query);
    if (mysqli_num_rows($run) > 0){
        $row = mysqli_fetch_assoc($run);
        $id=$row['userID'];
    }
    $title = $_POST['event'];
    $description =$_POST['description'];
    $date=$_POST['chosen'];
    $sql = "";
    $today=date("Y-m-d");
    if($date>$today){
        $sql="INSERT INTO `events`(`userID`,`eventHead`, `eventDesc`,`eventDate`,`eventStatus`) VALUES ($id,'$title','$description','$date',1)";
    }
    else{
        $sql="INSERT INTO `events`(`userID`,`eventHead`, `eventDesc`,`eventDate`,`eventStatus`) VALUES ($id,'$title','$description','$date',0)";
        
    }
    $run=mysqli_query($conn,$sql);

    if($run){
        echo 'hello';
    }
?>
