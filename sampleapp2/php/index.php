<!DOCTYPE html>
<html>
<head>
<title>Login </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
/* form {
  border: 3px solid #f1f1f1;
  } */

input[type=text], input[type=password] {
  width: 40%;
  margin: 8px 0;
  padding : 12px 20px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 50%;
}

/* .container {
  padding: 16px;
} */

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 200px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 50%;
  }
}
</style>
</head>
<body>

<h2 align="center">Login Form</h2>
<div align="center">
<form action="index.php" method="post" target="_blank">
  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
    <button type="submit">Login</button>
    <br>
  </div>
</form>
  </div>

</body>
</html>
<?php

session_start();

$user = $_POST['uname'];
$username='team';
$password='cbps';
$pass = $_POST['psw'];

if(isset($_POST['submit']))
{
if($user==$username AND $pass==$password)
{
header("Location: display.php")
}
else
{
echo "Wrong Username / Password.";
}
}

?> 

