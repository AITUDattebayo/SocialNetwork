<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="text/css" href="../photos/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="">
	<title>1 Task</title>
	<style type="text/css">
		.main {
			vertical-align: center;
			text-align: center;
			margin-top: 5%;
			color: black;
		}
		.row {
			vertical-align: middle;
			padding: 2%;
			background-color: lightgray;
			text-align: right;
			font-size: 150%;
		}
		.up {
			text-align: left;
			background-color: lightgray;
			border-top-right-radius: 5px;
			border-top-left-radius: 5px;
		}
		.down {
			background-color: lightgray;
			border-bottom-right-radius: 5px;
			border-bottom-left-radius: 5px;
			text-align: right;
		}
		.input {
			color: black;
			margin-right: 50%;
			border-radius: 5px;
			width: 100%;
			line-height: 3em;
		}
		.Agree {
			text-align: center;
		}
		.inputs {
			text-align: center;
		}
		.inpsel {
			width: 100%;
			color: black;
			border-radius: 5px;
			height: 2em;
		}
		.submitbut {
			background-color: lightgray; 
		}
		.linktologin, .linktologin:hover {
			text-decoration: none;

			margin: auto;
			color: black;	
			}
		@media(max-width: 991px ){
			.main {
				width: 80%;
			}
		}
	</style>
</head>
<body>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "finalproject");
if (mysqli_connect_error()) {
	echo mysqli_connect_error();
	exit;
}
	function passwordvalid() {
		if($_POST["password"]==$_POST["confirmpassword"]) {
			return true;
		} else return false;
	}
	function checkccheckbox() {
		if (isset($_POST['agree'])) {
			return true;
		} else return false;
	}
	if (isset($_POST["submit"])) {
		if(!passwordvalid()) {
			echo '<script>alert("ERROR, passwords must be similar")</script>'; 
		}
		if(!checkccheckbox()) {
			echo '<script>alert("ERROR, Must agree with the terms")</script>'; 
		}
              $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
              $user_username = mysqli_real_escape_string($conn, $_POST['user_username']);
              $password = mysqli_real_escape_string($conn, $_POST['password']);
              mysqli_real_query($conn,"INSERT INTO users (user_name, username, password) VALUES ('$user_name', '$user_username', '$password')");
              header("");
	}
	?>
	<form method="post">
		<div class="main col-lg-4 col-md-2 col-sm-1 col-xs-1" style="margin-top: 5%; margin-bottom: 5%;"></div>
	<div class="main col-lg-4 col-md-8 col-sm-10 col-xs-12" style="margin-top: 5%; margin-bottom: 5%; background-color: red;">
		<div class="row up">
			Sign Up
		</div>
		<div class="row">
			<div class="col-sm-4">Name</div>
			<div class="col-sm-8">
				<?php 
				echo "<input class='input' type='' name='user_name' minlength='5' placeholder='Enter First Name'>";
				?>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4">Username</div>
			<div class="col-sm-8">
				<?php 
				echo "<input class='input' type='' name='user_username' minlength='5' placeholder='Enter First Name'>";
				?>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-4">Password</div>
			<div class="col-sm-8">
				<?php
					echo "
				<input class='input' type='password' name='password' placeholder='Enter First Name'>
				";?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">Confirm Password</div>
			<div class="col-sm-8">
				<?php
					echo "
				<input class='input' type='password' name='confirmpassword' placeholder='Enter First Name'>
				";?>
			</div>
		</div>
		<div class="row Agree">
			<?php
					echo "
				<input id='cb' type='checkbox' name='agree' style='margin-bottom: 3%;''>
				";?>
     			<label for="cb" style="color: black">I Agree to the Term of Use</label>
		</div>
		<div class="row down">
				<a href="loginpage.php" class="linktologin">BACK</a>
    			<input type="submit" align="right" class="submitbut" name="submit" placeholder="submit" value="submit">
		</div>
	</div>
	<div class="main col-lg-4 col-md-2 col-sm-1 col-xs-1" style="margin-top: 5%; margin-bottom: 5%;"></div>
	</form>
</body>
</html>