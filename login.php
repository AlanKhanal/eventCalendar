<?php
    include 'dbconnect.php';
    session_start();

// check if the user is already logged in
if(isset($_SESSION['userID']))
{
    header("location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | mEC</title>
    <style>
        body{
            background-color: rgb(220, 219, 250);
        }
        nav{
            display:flex;
            justify-content:flex-end;
            background-color: black;
            color:white;
            border: 2px solid white;
            border-radius: 5px;
        }
        .navList{
            padding:10px 15px;
        }
        .loginBox{
            text-align: center;
            margin-top: 5%;
        }
        .loginData{
            padding:3px;
            font-size: 18px;
        }
        form div{
            padding-bottom: 10px;
            font-size: 18px;
        }
        .head{
            margin:3% 0%;
            position:relative;
            text-align: center;
        }
        nav a{
            text-decoration: none;
            color:white;
            font-weight: bold;
        }
        nav a:hover{
            color:gray;
            font-weight: bold;
        }
        .link a{
            text-decoration: none;
            color:gray;
        }
        .link a:hover{
            text-decoration: none;
            color:black;
        }
    </style>
</head>
<body>
    <div>
        <nav>
            <div class="navList"><a href="register.php">Register</a></div>
            <div class="navList"><a href="about.php">About Us</a></div>
            <div class="navList"><a href="help.php">Help</a></div>

        </nav>
    </div>
    <div>
        <div class="head"><h1>Login | myEvent Calendar</h1></div>
        <div class="loginBox">
            <form action="" method="POST">
                <div>
                    <label for="">Username</label><br>
                    <input type="text" class="loginData" id="" name="username" required/> 
                    <div id="usernameError" class="error"></div>
                </div>
                <div>
                    <label for="">Password</label><br>
                    <input type="password" class="loginData" id="" name="password" required/> 
                    <div id="passwordError" class="error"></div>
                </div>
                <div>
                    <input type="submit" name="submit" class="loginData" value="Login"> 
                </div>
            </form>
        </div>
        <div align=center class="link"><a href="register.php">Create an account? Sign up!</a></div>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $username=trim($_POST['username']);
    $password=$_POST['password'];
    $valid = true;
    if($username==""){
        echo '<div class="error">Username is empty.*</div>';
        $valid = false;
    } 
    if($password==""){
        echo '<div class="error">Password is empty.*</div>';
        $valid = false;
    }
    $userCheck="SELECT * FROM users WHERE `username`='$username' AND `password`='$password' AND `status`=1";
    $check1 = mysqli_query($conn, $userCheck);
    $num1 = mysqli_num_rows($check1);
    if($num1<1){
        echo '<div class="error">Username and Password not matched.</div>';

        $valid=false;
    }
// }
// if(isset($_POST['submit'])){
    
    if($valid){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["loggedin"] = true;
        $query="SELECT `userID` FROM users where username='$username' AND `status`=1";
        $run=mysqli_query($conn,$query);
        if (mysqli_num_rows($run) > 0){
            $row = mysqli_fetch_assoc($run);
            $id=$row['userID'];
        }
        else{
            echo 'verify login in email.';
        }
        $_SESSION["userID"]=$id;
        // echo $id;
        header("location:home.php");
    }
}
?>