<?php
  $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'eventcal';

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(!$conn){
        die('Not Connected'.mysqli_connect_error());
    }
  ?>