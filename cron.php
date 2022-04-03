<?php
    include 'dbconnect.php';

    
    // $query = "SELECT `userID` FROM users WHERE username='$user'";
    // $mail=mail();
    



    $query="SELECT * FROM users INNER JOIN events ON users.userID=events.userID WHERE eventStatus=1 ORDER BY eventDate";
    $run=mysqli_query($conn,$query);
    $tomorrow = new DateTime('tomorrow');
    $tom= $tomorrow->format('Y-m-d');
    if (mysqli_num_rows($run) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($run)) {
        // $user=$row['username'];
        $date=$row['eventDate'];
        $id=$row['eventID'];
        $to=$row['email'];
        $title=$row['eventHead'];
        $desc=$row['eventDesc'];
        if($date==$tom){
        // echo $tom;
        $header=("");
        if(mail($to,$title,$desc,"From:less.secure.email.for.students@gmail.com")){
            echo 'Success';
        }
        else{
            echo 'Failed';
        }
    }
    }
    } else {
    echo "0 results";
    }
    mysqli_close($conn); 
    

    // session_start();
    // if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
    // {

    //         header("location: login.php");
        
    // }
    // $user = $_SESSION['username'];
    // $query = "SELECT `userID` FROM users WHERE username='$user'";
    // $run=mysqli_query($conn,$query);
    // if (mysqli_num_rows($run) > 0){
    //     $row = mysqli_fetch_assoc($run);
    //     $id=$row['userID'];
    // }
    // $query0="SELECT * FROM events WHERE userID=$id AND eventStatus=1 ORDER BY eventDate asc";
    // $run0=mysqli_query($conn,$query0);
    // $number0=mysqli_num_rows($run0);
    // if ( $number0> 0){
    //     $row0 = mysqli_fetch_assoc($run0);
    //     $date0=$row0['eventDate'];
    //     $title0=$row0['eventHead'];
    //     $desc0=$row0['eventDesc'];
    // }
    // else{
    //     $date0="1990-01-01";
    // }
    // $tomorrow = new DateTime('tomorrow');
    // $tom= $tomorrow->format('Y-m-d');
    // $query2="SELECT * FROM users WHERE userID=$id";
    // $run2=mysqli_query($conn,$query2);
    // $number2=mysqli_num_rows($run2);
    // if (mysqli_num_rows($run2) > 0){
    //     $row2 = mysqli_fetch_assoc($run2);
    //     $username=$row2['username'];
    //     $email=$row2['email'];
    // }
    // if($number0>0){
        
    //     $num=$number0;
        
    //         $query="SELECT * FROM events WHERE userID=$id AND eventStatus=1 AND eventDate='$tom' ORDER BY eventDate";
    //         $run=mysqli_query($conn,$query);
    //         $number=mysqli_num_rows($run);
    //         if ( $number> 0){
    //             $row = mysqli_fetch_assoc($run);
    //             $date=$row['eventDate'];
    //             $title=$row['eventHead'];
    //             $desc=$row['eventDesc'];
    //         }
    //         else{
    //             $date="1990-01-01";
    //         }
    //         $query2="SELECT * FROM users WHERE userID=$id AND eventDate='$tom'";
    //         $run2=mysqli_query($conn,$query2);
    //         $number2=mysqli_num_rows($run2);
    //         if (mysqli_num_rows($run2) > 0){
    //             $row2 = mysqli_fetch_assoc($run2);
    //             $username=$row2['username'];
    //             $email=$row2['email'];
    //         }
    //         for($i=0;$i<$num;$i++){
    //         if($date==$tom){
    //             echo $tom;
    //         //     $to=$email;
    //         //     $subject=$title."[".$date."]";
    //         //     $msg="EventDescription: ".$desc;
    //         //     $headers="From:less.secure.email.for.students@gmail.com";
    //         //     // header("location:login.php");
    //         //     if(mail($to,$subject,$msg,$headers)){
    //         //         echo 'success<br>';
    //         //         $updateQuery="UPDATE events SET eventStatus=0 WHERE userID=$id AND eventDate='$date' AND eventStatus=1";
    //         //         $run=mysqli_query($conn,$updateQuery);
    //         //     }
    //         //     else{
    //         //         echo "Failed";
    //         //     }
    //         }
    //         // else{
    //         //     echo 'No mails';
    //         // }
    //     }
    // }
    
?>