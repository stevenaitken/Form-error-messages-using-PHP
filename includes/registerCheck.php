<?php
require 'includes/errors.php';
require 'includes/db_connx.php';
//create empty variables to store error messages
$nameErr = $passErr = "";
$err = 0; // set a flag which you can toggle between 0 and 1 to identify the current state 
echo $err; // not required only for testing 

//check if data has been posted via form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if(!empty($_POST['username'])){
    $user = $_POST['username'];
    $pwd = $_POST["pwd"]; 
    echo "Posted data"; // not required only for testing 
    echo $user;// not required only for testing 
    echo  $pwd;// not required only for testing 
  }


//Check if user exists in database
$check = "SELECT * FROM users WHERE username  = '$user'";
$result = $conn->query($check);


//if username exists.This means that query has returned true and has found an entry equal to query string
if($result->num_rows > 0){
  $nameErr =  "Username already taken";
  $err = 1;   //if user exists set flag to 1
  }

//check if passwords match

  if($_POST["pwd"] !== $_POST["confirm-pwd"]){
    $passErr =  "Passwords do not match";
    $err = 1; //if passwords do not matchset flag to 1
}

if($err === 0){ // check state of flag
 $nameErr =  ""; // clear error message 
 $passErr =  ""; // clear error message 
 echo "all good"; // not required only for testing 

// insert data into database
 $hashedPwd_hash = password_hash($user, PASSWORD_DEFAULT);
 $sql = "INSERT INTO users (username, pwd)VALUES ('$user', ' $hashedPwd_hash')";
 if ($conn->query($sql) === TRUE) {
     echo "New record created successfully";
   } else {
     echo "Error: " . $sql . "<br>" . $conn->error; // remove the  else statement in production mode
   }


}











} // end of server post check - last of the ifs!!



?>
