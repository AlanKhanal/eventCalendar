<?php
    include 'header.php';
    include 'dbconnect.php';
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
    {
        header("location: login.php");
    }
    $user = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username='$user'";
    $run=mysqli_query($conn,$query);
    if (mysqli_num_rows($run) > 0){
        $row = mysqli_fetch_assoc($run);
        $id=$row['userID'];
        $name=$row['username'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>mEC || Profile</title>
    <style>
        .head{
            margin:2% 2%;
            font-size:25px;
            display: flex;
            justify-content: flex-start;
        }
    </style>
</head>
<body>
    <div>
        <div class="head">
            <div style="color:red">Username:</div>
            <div><?=" "?></div>
            <div ><i><?=$name?></i>
            </div>
        </div>
        <div class="head">
            <div style="color:red">Email: </div>
            <div ><i><?=$row['email']?></i>
            </div>
        </div>
        <a href="change.php"><input type="submit" value="Delete All Events"></a>
    </div>
</body>
</html>

<?php
    include 'footer.php';
?>