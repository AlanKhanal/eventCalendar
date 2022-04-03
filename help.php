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

    <div align=center>
    <p><b>myEvent Calendar.</b><br><br>
    >> Register and Login<br>
    >> Verify E-mail. <br>
    >> Create Events. <br>
    >> Manage Events. <br>
    >> Get Notified. <br>
    For Further help: Email us on <i>bca190607_alan@achsnepal.edu.np</i>.<br><b>THANK YOU!</b></p>
    </div>

    </body>
</html>