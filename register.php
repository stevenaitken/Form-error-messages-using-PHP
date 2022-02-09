<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="A short description of the web page purpose/ intent">
    <meta name="author" content="Steven Aitken 2021">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Register</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<?php
include 'includes/registerCheck.php';

?>

<h1>Register</h1>
<p><span class="error">* required field</span></p>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"  id="login" name="login" class="login">
<label for "username">Enter Username</label>
<input type="text" id="username" name="username" class="username" required placeholder="Enter username">
<span class="error"> * <?php echo $nameErr;?></span>
<p>
    <label for "pwd">Enter Password</label>
    <input type="password" id="pwd" name="pwd" class="pwd" required placeholder="Enter password">
    <span class="error"> * <?php echo $passErr;?></span>
</p>

<p>
    <label for "pwd">Confirm Password</label>
    <input type="password" id="confirm-pwd" name="confirm-pwd" class="confirm-pwd" required placeholder="Enter password">
    <span class="error"> * <?php echo $passErr;?></span>
    </p>

<input type="submit" value="Submit">

</form>


</body>
</html>

