<?php
    include 'dbconnect.php';
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
        .regData{
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
        .error{
            color:red;
            text-align: center;
            padding:5px;
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
            <div class="navList"><a href="Login.php">Login</a></div>
            <div class="navList"><a href="about.php">About Us</a></div>
            <div class="navList"><a href="help.php">Help</a></div>

        </nav>
    </div>
    <div>
        <div class="head"><h1>Register | myEvent Calendar</h1></div>
        <div class="loginBox">
            <form action="" method="POST">
                <div>
                    <label for="">Username</label><br>
                    <input type="text" class="regData" id="username" name="username" required/> 
                    
                </div>
                <div>
                    <label for="">E-mail</label><br>
                    <input type="email" class="regData" id="email" name="email" required/> 
        
                </div>
                <div>
                    <label for="">Password</label><br>
                    <input type="password" class="regData" id="password" name="password" required/> 
                    
                </div>
                <div>
                    <input type="submit" onclick="verification();preventDefault();" class="regData" value="Register" name="submit"> 
                </div>
            </form>
        </div>
        <div align=center class="link"><a href="login.php">Already have an account? Login!</a></div>
    </div>   
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $user=trim($_POST['username']);
        $password=$_POST['password'];
        $email=trim($_POST['email']);
        $valid = true;
            if($user==""){
                echo '<div class="error">Username is empty.*</div>';
                $valid = false;
            }
            else if(strlen($user) < 6){
                echo '<div class="error">Username must be atleast 6 characters.*</div>';
                $valid=false;
            }
            else if(strpos(trim($user), ' ') !== false)
            {
                echo '<div class="error">Username must be single word.*</div>';
                $valid=false;
            }
            else{
                $username=$user;
            }
            if($password==""){
                echo '<div class="error">Password is empty.*</div>';
                $valid = false;
            }
            else if(strlen($password) < 8){
                echo '<div class="error">Password must be atleast 8 characters.*</div>';
                $valid=false;
            }
            if($email==""){
                echo '<div class="error">Email is empty.*</div>';
                $valid = false;
            }
            $emailCheck="SELECT * FROM users WHERE email='$email' AND status=1";
            $check1 = mysqli_query($conn, $emailCheck);
            $num1 = mysqli_num_rows($check1);
            if($num1>0){
                echo '<div class="error">Email already taken.</div>';
                $valid=false;
                
            }
            $userCheck="SELECT * FROM users WHERE username='$username'";
            $check2 = mysqli_query($conn, $userCheck);
            $num2 = mysqli_num_rows($check2);
            if($num2>0){
                echo '<div class="error">Username already taken.</div>';
                $valid=false;
            } 
    }
    if(isset($_POST['submit'])){
        if($valid){
            $query = "INSERT INTO users(`username`,`password`,`email`) VALUES('$username','$password','$email')";
            $runQuery = mysqli_query($conn,$query);
            if($runQuery){
                $to=$email;
                $subject='E-mail Verification';
                $msg="<a href='http://localhost:8081/eventcal/verify.php?user=$username'>Click here to register Account.</a>";
                $headers="From:less.secure.email.for.students@gmail.com";
                // header("location:login.php");
                mail($to,$subject,$msg,$headers);
                header('location:notfmail.php');
            }
            else{
                echo 'error';
            }
        }
    }
?>