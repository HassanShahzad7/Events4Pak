<?php

session_start();

$conn = new MySQLi("localhost", "root", "", "project");

//$dom = new DOMDocument();

if(isset($_POST["username"]) && isset($_POST["password"]))
{
	
	if($conn->connect_error)
	{
		die("Error: " . $conn->connect_error);
	}
	
	$username = $_POST["username"];
	$password = md5($_POST["password"]);
		
	$q = "SELECT * FROM users WHERE username = \"$username\" and password = \"$password\"";
	
	$check = mysqli_query($conn, $q);
	
	$check_rows = mysqli_num_rows($check);
	
	if($check_rows == 1)
	{
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		
		
		header("Location: nice-html/ltr/pages-profile.php");
		exit;
	}
	else
	{
		echo "error";
		session_destroy();
	}

	

}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

	<meta name="viewport" content="width=device-width", initial-scale="1.0">

	<link rel="stylesheet" href="login.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


<title>Login</title>
</head>

<body>


	<script>
		
		$(document).ready(function(){
			
			$("#login").click(function(){
				
				$("form").submit();
				
			});
			
		});
		
	</script>
	

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
	<div class="container-fluid">
		<a href="home.html" class="navbar-brand">EventsforPak</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResp">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id= "navbarResp">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="home.html" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="Project.html" class="nav-link">Events</a>

				</li>
				<li class="nav-item">
					<a href="aboutus.html" class="nav-link">About</a>
				</li>
				<li class="nav-item">
					<a href="contact.html" class="nav-link">Contact Us</a>
				</li>
				<li class="nav-item">
					<a href="login.php" class="nav-link">Sign Up/Login</a>
				</li>
			</ul>
		</div>
	</div>
</nav>



	<div class="top">

		<div class="signup">

			<p> Not a member? </p> <a href="signup.php" id="signup-but"> Sign Up </a>

		</div>

	</div>

	<div class="clear">	</div>


	<div class="login">

		<div class="logo">

			<span class="fa fa-snowflake-o"> </span>

		</div>

		<h2> Login </h2>

		<form method="post" action="login.php">

		<div class="form">

			<div class="form-elements">

				<label title="Username" for="username">

					<span class="fa fa-user"> </span>

				</label>

				<input type="email" placeholder="Username" id="username" name="username" required>

				<div class="clear"> </div>

			</div>


			<div class="form-elements">

				<label title="Password "for="password">

					<span class="fa fa-key"> </span>

				</label>

				<input type="password" placeholder="Password" id="password" name="password" required>

				<div class="clear"> </div>

			</div>


			<div class="button-group">

				<a href="#" id="login" name="login"> Login </a>

				<a href="#" id="forget"> Forgot Password? </a>

			</div>
			
			<div style="margin-top: 20px;">
				
				<span id="span" style="color: red;"> </span>
				
			</div>




		</div>

		</form>

	</div>



</body>
</html>
