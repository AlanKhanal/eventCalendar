<?php
    include 'header.php';
    include 'dbconnect.php';
    if(isset($_REQUEST['edit'])){
        $id = $_REQUEST['edit'];
    
        $yourEvent = "SELECT * FROM events WHERE eventID=$id";
        $run = mysqli_query($conn, $yourEvent);
        $row=mysqli_fetch_array($run);
    
        $eventName = $row['eventHead'];
        $eventDesc = $row['eventDesc'];
        $eventDate = $row['eventDate'];
        if($eventName == ""){
            echo 'Error occured!';
        }
        if($eventDate == ""){
            echo 'Error occured!';
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Event | mEC</title>
    <style>
        .box{
            text-align: center;
            /* margin-top: 2%; */
            border: 5px solid black;
            border-radius: 10px;
            background-color: white;
            margin:2% 25%;
            padding:1% 5%;
        }
        .inputs{
            margin-bottom: 2rem;
        }
        input,textarea{
            padding:5px;
        }
        textarea{
            border: 2px solid black;
        }
    </style>
</head>
<body>
   <div class="box">
    <div align=center style="padding-bottom:1rem"><b><u>UPDATE YOUR EVENT!</b></u></div>
   <form action="" method="POST">
        <div class="inputs">
            <label for="">Date</label><br>
            <input type="date" name="date" value="<?=$eventDate?>">
        </div>
        <div class="inputs">
            <label for="">Title</label><br>
            <input type="text" name="title" value="<?=$eventName?>">
        </div>
        <div class="inputs">
            <label for="">Description</label><br>
            <textarea name="desc" id="" cols="70" rows="10"><?=$eventDesc?></textarea>
        </div>
        <div class="inputs">
            <input type="submit" name="submit" id="submit">
        </div>
   </form>
   </div>
</body>
</html>
<?php
$error="";
    if(isset($_POST['submit'])){
        $date=$_REQUEST['date'];
        $title=$_REQUEST['title'];
        $desc=$_REQUEST['desc'];
        $valid=true;
        if($date==""){
            $error="empty date*<br>";
            $valid=false;
        }
        if($title=="" || strlen($title)<=0){
            $error.="empty title*<br>";
            $valid=false;
        }
        else if(strlen($title)>20){
            $error.="Only 20 characters*<br>";
            $valid=false;
        }
        if(strlen($desc)>1000){
            $error.="Only 1000 characters*<br>";
            $valid=false;
        }
        if($valid){
            $queryUpdate="UPDATE `events` SET `eventDate`='$date',`eventHead`='$title',`eventDesc`='$desc' WHERE `eventID`=$id AND `eventStatus`=1";
            $run = mysqli_query($conn,$queryUpdate);
            if($run){
                header('location:events.php');
            }
        }
    }
?>
    <div align=center style="color:red"><i><?php echo $error ?></i></div>
    <div><a href="events.php" style="text-decoration:none;color:gray;"><b><<[Go Back]<<</b></a></div>
