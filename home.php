<?php
     include ('header.php');
     include ('dbconnect.php');
     
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
    <title>myEvent calendar</title>
    <link rel="stylesheet" href="calbody.css">
    <link rel="stylesheet" href="cal_main_body.css">
    <script src="calendar.js"></script>
    <style>
        #evLink{
            font-size:18px;
            color:red;
        }
        #evLink:hover{
            font-weight: 1000;
            color:red;
        }
        li{
            margin-bottom:-20px;
            cursor:default;
        }
        a{
            color:gray;
            text-decoration: none;
            cursor:pointer;
        }
        a:hover{
            color:black;
            cursor:pointer;
        }
        td{
            text-align: center;
            cursor:default;
        }
        .Error{
            padding:0%;
            margin-top:-25px;
            margin-bottom:-25px;
            color:red;
            font-size:small;
            font-style: italic;
        }
        .input{
            padding:0%;
            margin-top:-25px;
        }

    </style>
    <script src="calendar.js"></script>
</head>
<body>
    <div id="success" style="color:gray;position:absolute;" hidden><b><i>Event added successfully</i></b></div>
    <div id=popup class=popup style="border:2px solid black" hidden>
        <div id="formdiv" style="background:white">
        <form id="data" >
            <table>
                <tr>
                    <td style="display:flex;justify-content:space-between;padding:5px;background:black;color:white;"><div>ADD EVENT</div><div onclick="toggle()">X</div></td>
                </tr>
                <tr>
                    <td style="background:white;"><u><input type="date" id="chosen" name="chosen" class="input" style="padding:2px 5px"></u></td>
                </tr>
                <tr>
                    <td style="background:white;"><div id="dateError" class="Error"></div></td>
                </tr>
                <tr>
                    <td style="background:white;"><label for="">Title</label><br>
                    <input type="text" id="event" name="event" class="input" style="padding:2px 5px"></td>
                <tr>
                    <td style="background:white;"><div id="eventError" class="Error"></div></td>
                </tr>
                    
                </tr>
                <tr>
                    <td style="background:white;">
                    <textarea name="description" id="description" class="input" placeholder="Description of the event*" cols="100" rows="10" style="resize:none;border:2px solid black;padding:2px 5px;"></textarea></td>
                    <tr>
                        <td style="background:white;"><div id="descError" class="Error"></div></td>
                    </tr>
                </tr>
                <tr>
                    <td colspan=2 style="background:white;">
                    <!-- <input type="submit" id="submit" name="submit" onclick="toggle();"> -->
                    <button type="button" id="submit" onclick="submitting()">submit</button>
                </td>
                </tr>
            </table>   
        </form>
        </div>
    </div>
               
    <div class="cal-body">
        <div class="cal-body-display">
            <b>CURRENT TIME</b>
            <div class="cal-body-display-up" id="time">
                <script src="displayTime.js"></script>
            </div>
            <br>
            <div class="cal-body-display-down">
                <div>
                    <b>NEXT EVENT</b><br>
                    <div class="coming-event">
                    <i class="timeRemain">
                            <?php
                                $dateQuery1="SELECT MIN(eventDate) AS `eventDate` FROM `events` WHERE `userID`=$id and `eventStatus`=1";
                                $proceed1=mysqli_query($conn,$dateQuery1);
                                $row1 = mysqli_fetch_assoc($proceed1);
                                    echo $row1['eventDate'];
                            ?>
                        </i>
                        <div class="nextEvent" style="background: #dcdbfa; border-radius:5px; padding:0px 2px;">
                            <?php 
                                $nextQuery="SELECT * FROM events ORDER BY eventDate ";
                                $proceed=mysqli_query($conn,$nextQuery);
                                $row = mysqli_fetch_assoc($proceed);
                                    echo $row['eventHead'];
                            ?>
                        </div>
                    </div>
                </div>
                <div style="margin-top:3rem">
                    <b>Welcome!<br><?="<div><a href='profile.php' style='text-decoration:none;color:red'>".$user."</a></div>"?></b>
                    <div style="font-size:26px;"><i>
                    <?php
                        $totEv="SELECT * FROM events WHERE userID=$id AND eventStatus=1";
                        $runn=mysqli_query($conn,$totEv);
                        $count=mysqli_num_rows($runn);
                        if($count>0){
                            echo 'You have '.$count.' </i>events.';
                        }
                        else{
                            echo 'Add event to get notified.</i>';
                        }
                    ?>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="cal-body-main">
            <div class="cal-body-main-year">
                
                <h6 style="margin:0">SELECT DATE</h6>
                <div style="display:flex;justify-content:center">
                    <div style="margin-right:2px;"><input type="number" id="year" min=2022 max=2200  value=2022 name=year required/></div>
                    <div style="margin-right:2px;"><input type="number" id="month" min=1 max=12 value=4 name=month required/></div>

                    <div><button onclick="calendar();">GO</button></div>
                </div>
            </div>
            
            <div class="cal-body-main-month">
                <div id="theMonth">
                    
                    <div id="displayer">
                        <script>calendar();</script>
                    </div>
                    <!-- message -->
                </div>
            </div>
            <div id="calendar">
            </div>
                
        </div>
       
       <div class="cal-body-event">
           <b>EVENTS</b>
           <?php
                $query="SELECT * FROM `events` WHERE userID=$id and `eventStatus`=1 ORDER BY eventDate LIMIT 9";
                $proceed=mysqli_query($conn,$query);
                if (mysqli_num_rows($proceed) > 0){
                    // output data of each row
                    while($row = mysqli_fetch_assoc($proceed)) {
                        echo '<ul type=square><li style="font-size:14px">'.$row['eventDate'].'<br>[<i>'.$row['eventHead'].'</i>]</li></ul>';
                       }
                } else {
                    echo "<br><i style='color:gray'>No Events</i>";
                }
                if(mysqli_num_rows($proceed) > 8){
                    echo "<a href='events.php' id='evLink'>View Events</a>";
                }
            ?>
               

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script>
                    function submitting(){
                        var $valid=true;
                        myDate=document.getElementById("chosen").value;
                        myTitle=document.getElementById("event").value;
                        myDesc=document.getElementById("description").value;
                        // for date
                        if(myDate==''){
                            document.getElementById("dateError").innerHTML="Date cannot be empty*";
                            $valid=false;
                        }
                        // else if(myDate<=today){
                        //     document.getElementById("dateError").innerHTML="Past Date cannot be selected";
                        // }
                        else{
                            document.getElementById("dateError").innerHTML=" ";
                        }
                        // for title
                        if(myTitle=='' || (myTitle.length)<=0 ){
                            document.getElementById("eventError").innerHTML="Title cannot be empty*";
                            $valid=false;
                        }
                        else if((myTitle.length)>20 ){
                            document.getElementById("eventError").innerHTML="Only 20 characters*";
                            $valid=false;
                        }
                        else{
                            document.getElementById("eventError").innerHTML=" ";
                        }
                        // for desc
                        // if(myDesc=='' || (myDesc.length)<=0 ){
                        //     document.getElementById("descError").innerHTML="Desc cannot be empty*";
                        //     $valid=false;
                        // }
                         if((myDesc.length)>1000 ){
                            document.getElementById("descError").innerHTML="Only 1000 characters*";
                            $valid=false;
                        }
                        else{
                            document.getElementById("descError").innerHTML=" ";
                        }
                        if($valid){
                                $(document).ready(()=>{
                                $.ajax({
                                    url : 'insertForm.php',
                                    type: 'POST',
                                    data: $('#data').serialize(),
                                    success : (data) =>{
                                        console.log(data);
                                    }
                                })
                                toggle();
                        });
                        document.getElementById('success').style.display="block";
                        success();
                        }
                        // $(document).ready(()=>{

                        // $('#submit').click(()=>{
                        // console.log($('#data').serialize());
                        // $.ajax({
                        //     url : 'insertForm.php',
                        //     type: 'POST',
                        //     data: $('#data').serialize(),
                        //     success : (data) =>{
                        //         console.log(data);
                        //     }
                        // })
                        // });
                        // });
                        // }
                        // if(myTitle==''){
                        //     document.getElementById("msg").innerHTML='Please Insert Title';
                        // }
                        
                    }
                </script>
                <!-- <script>
                    // $document.ready(()=>{
                    //     //searching
                    //     $("#searchs").on("keyup",()=>{
                    //         console.log($('#searchs').serialize());
                    //         $.ajax({
                    //             url: "liveSearch.php",
                    //             type:"POST",
                    //             data2:$('#searchs').serialize(),
                    //             success:(data2)=>{
                    //                 console.log(data2) 
                    //             }
                    //         });
                    //     });
                    // });
                </script> -->
</body>
</html>

<?php
    require ('footer.php');
?>


<script src="buttons.js"></script>