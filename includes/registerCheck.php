<?php
require 'includes/errors.php';
require 'includes/db_connx.php';
//create empty variables to store error messages
$nameErr = $passErr = "";
$err = 0;
echo $err;

//check if data has been posted via form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(!empty($_POST['username'])){
    $user = $_POST['username'];
    $pwd = $_POST["pwd"]; 
    echo "Posted data";
    echo $user;
    echo  $pwd;
  }


//Check if user exists
$check = "SELECT * FROM users WHERE username  = '$user'";
$result = $conn->query($check);


//if username exists.This means that query has returned true and has found an entry equal to query string
if($result->num_rows > 0){
  $nameErr =  "Username already taken";
  $err = 1;  
  }

//check if passwords match

  if($_POST["pwd"] !== $_POST["confirm-pwd"]){
    $passErr =  "Passwords do not match";
    $err = 1; 
}

if($err === 0){
 $nameErr =  "";
 echo "all good";

   
 $hashedPwd_hash = password_hash($user, PASSWORD_DEFAULT);
 $sql = "INSERT INTO users (username, pwd)VALUES ('$user', ' $hashedPwd_hash')";
 if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
   }


}











} // end of server post check - last of the ifs!!



?>