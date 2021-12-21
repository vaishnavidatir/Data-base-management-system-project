<?php

$host="localhost";
$user="root";
$password="";
$db="login";

$conn = mysqli_connect($host,$user,$password,$db);

if(!$conn){
    echo " Not Connected";
}

if(isset($_POST['loginUser'])){
    $uname=$_POST['email'];
    $password=$_POST['password'];
    
    $sql="SELECT * FROM `user` WHERE email='$uname' AND password='$password' LIMIT 1";
    $result=mysqli_query($conn,$sql) or die("query failed");
   
    if($result){
       $fetch = mysqli_fetch_assoc($result);
       if($uname == $fetch['email']){
           echo "Login";
       }else{
           echo "Wrong Credentials";
       }
        
    }
    
   
        
}

?>