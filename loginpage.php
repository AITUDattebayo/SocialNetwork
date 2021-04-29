<?php 
session_start();
if(isset($_SESSION["id"])) {
    	header("Location:userpage.php");
}
$conn = mysqli_connect("localhost", "root", "", "finalproject");
if (mysqli_connect_error()) {
	echo mysqli_connect_error();
	exit;
}


if (isset($_POST["submit"])) {
		if ( empty($_POST['username']) || empty($_POST['password']) ) {
        		echo '<script>alert("Please fill everything")</script>'; 
		} else {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if ($username=="Admin" && $password=="Admin") {
        	   $_SESSION["name"] = 'admin';
        	$_SESSION["photo"]='admin.jpg';
        	header("Location:adminpage.php");
        }
        $query    = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        	$_SESSION["id"] = $row['user_id'];
        	$_SESSION["name"] = $row['user_name'];
        } else {
        	echo '<script>alert("Incorrect Username or Password")</script>'; 
        }
        if(isset($_SESSION["id"])) {
    	header("Location:");
    	}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="text/css" href="../photos/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="">
	<style type="text/css">
		h1 {
			color: black;
			font-size: 300%;
		}
		label {
			color: black;
		}
		.maincont {
			vertical-align: center;
			text-align: center;
			margin-top: 5%;
		}
		.maincont > input {
			width: 40%;
			border-radius: 5px;
		}
	</style>
	<title>1TaskLogin</title>
</head>
<body>
<form method="POST">
	<div class="maincont col-lg-4 col-md-8 col-sm-10 col-xs-12" style="margin: auto; margin-top: 5%; margin-bottom: 5%; background-color: lightgray;">
		<h1>Login</h1>
		<label>Username:</label>
	<input type="text" name="username" class="inputs col-xs-12" value="">
	<br><br>
	<label>Password</label>
	<input type="password" name="password" class="inputs col-xs-12" value="">
	<br><br>
	<button type="submit" name="submit">Log In</button>
	<a href="registrationpage.php" style="text-decoration: none; color: inherit; color: black;">Registration</a><br>
	<a href="" style="text-decoration: none; color: inherit; color: white;">Back</a>
	</div>
</form>
</body>
</html>