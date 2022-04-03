<?php
    require('header.php');
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
    {

            header("location: login.php");
        
    }
?>

<div align=center>
   <p><b>myEvent Calendar.</b><br><br>This is an Event Calendar for Scripting Language project.<br>If you have any request or issues contact us on <i>bca190607_alan@achsnepal.edu.np</i>.<br><b>THANK YOU!</b></p>
</div>

<?php
    require('footer.php');
?>