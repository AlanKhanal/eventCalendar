<?php
include 'dbconnect.php';
if(isset($_GET['user'])){
    $username=$_GET['user'];

    $query="SELECT `username` FROM users WHERE `status`=0 AND `username`='$username'";
    $run = mysqli_query($conn,$query);
    if (mysqli_num_rows($run) >0){
        $update = "UPDATE users SET `status`=1 WHERE `username`='$username'";
        $run=mysqli_query($conn,$update);
        if($run){
            header('location:home.php');
        }
    }
    else{
        echo "NOT FOUND";
    }
}
else{
    echo "ERROR";
}
?>