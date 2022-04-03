<?php
    require('header.php');
    include 'dbconnect.php';
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

?>
<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <style>
        td{
            padding:2rem;
            text-align: center;
        }
        td,th{
            border-bottom:1px solid white;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div>
    <div style="display:flex;justify-content:space-between;margin:0px 10px;">
        <div><form method="POST" action="events.php"><input type="submit" value=R style="border:1px solid white;padding:0px 10px;background:black;color:white;" name="reload" id="reload"></form></div>
        
        <div align=right><form action="" method="POST">
            <b>By Date: <input type="date" name="dateSearch"style='color:black;background-color:white'></b> 
        <!-- </div>
        <div> -->
            <b>By Title: <input type="text" name="nameSearch"></b><input type="submit" id="submit" name="submit" value="SEARCH">
        </form>
    </div> 
    </div>  
        <br>
        <div>
    
        <b>Your Events</b>
        <table align=center>
            <tr>
                <th width=15%>EVENT ON</th>
                <th width=15%>EVENT</th>
                <th width=50%>DESCRIPTION</th>
                <th width=15%>MANAGE</th>
            </tr>
        <?php
            echo '<br><hr>';
            $query="SELECT * FROM `events` WHERE userID=$id AND `eventStatus`=1 ORDER BY eventDate";
            if(isset($_POST['submit'])){
                $s_date=$_REQUEST['dateSearch'];
                $s_name=$_REQUEST['nameSearch'];
                if($s_name!=""){
                    $query="SELECT * FROM `events` WHERE userID=$id AND `eventStatus`=1 AND `eventHead` LIKE '%$s_name%' ORDER BY eventDate";
                }
                if($s_date!=""){
                    $query="SELECT * FROM `events` WHERE userID=$id AND `eventStatus`=1 AND `eventDate` LIKE '%$s_date%' ORDER BY eventHead";
                }
                if($s_date!="" && $s_name!=""){
                    $query="SELECT * FROM `events` WHERE userID=$id AND `eventStatus`=1 AND `eventHead` LIKE '%$s_name%' AND  `eventDate` LIKE '%$s_date%' ORDER BY eventDate";
                }
            }
            $proceed=mysqli_query($conn,$query);
            if (mysqli_num_rows($proceed) > 0){
                $i=mysqli_num_rows($proceed);
                // output data of each row
                while($row = mysqli_fetch_assoc($proceed)){
                    $id=$row['eventID'];
                    echo "<tr><td width=15%>
                    <b>".$row["eventDate"]."</b></td><td width=15%>".$row["eventHead"]."</td><td width=50% align=right><textarea style='background:rgb(220, 219, 250);border:0px;border-bottom:1px solid white;border-right:1px solid white;' cols='100' rows='2' readonly>".$row["eventDesc"]."</textarea></td><td width=15%>"
                    ."<i><a href='editEvent.php?edit=".$id."'>EDIT</a>"." <a href='deleteEvent.php?dlt=".$id."'>DELETE</a>";
                }
              } else {
                echo "0 results";
              }
        ?>
        </table>
    </div>
</div>
</body>
</html>
<?php
    require('footer.php');
?>
