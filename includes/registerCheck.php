<?php
require 'includes/errors.php';
require 'includes/db_connx.php';
//create empty variables to store error messages
$nameErr = $passErr = "";

//check if data has been posted via form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(!empty($_POST['username']))
    $user = $_POST['username'];
    $pwd = $_POST["pwd"]; 

//Check if user exists
$check = "SELECT * FROM users WHERE username  = '$user'";
$result = $conn->query($check);

//if username exists.This means that query has returned true and has found an entry equal to query string
if($result->num_rows > 0){
    $nameErr =  "Username already taken";
    
    }

    if($_POST["pwd"] !== $_POST["confirm-pwd"]){
    $passErr =  "Passwords do not match";

}

else{  
    
    $nameErr =  "";
   
    $hashedPwd_hash = password_hash($user, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, pwd)VALUES ('$user', ' $hashedPwd_hash')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }


}



}
?>