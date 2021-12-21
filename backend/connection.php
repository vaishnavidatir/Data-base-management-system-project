<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="myhotel";

    $conn = mysqli_connect($host,$user,$password,$db);

    if(!$conn){
        echo "Not Connected";
    }

?>