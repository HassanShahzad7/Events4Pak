<?php


session_start();


$conn = new MySQLi("localhost", "root", "", "project");

//$dom = new DOMDocument();

if(isset($_POST["name"]) && isset($_POST["email"]))
{

	if($_POST["password"] != $_POST["conpw"])
	{
		die("Passwords do not match");
	}
	
	
	if($conn->connect_error)
	{
		die("Error connecting to database. Error: " . $conn->connect_error);
	}
	
/*	print_r($_POST);
	exit;
*/	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$pass = md5($_POST["password"]);
	$university = $_POST["university"];
	$degree = $_POST["degree"];
	$domain = $_POST["domain"];
	
	$check = mysqli_query($conn, "SELECT * FROM users WHERE username =\"$email\"");

	$check_rows = mysqli_num_rows($check);
	
	if($check_rows > 0)
	{
		die("The email already exists");
	}
	
	$q = "INSERT INTO users VALUES (\"$name\", \"$email\", \"$pass\", \"$university\", \"$degree\", \"$domain\", null)";


	$added = mysqli_query($conn, $q);

	echo $added;

	echo "Entry added successfully";

	mysqli_close($conn);


	$_SESSION["username"] = $email;

	$_SESSION["password"] = $pass;

	if(isset($_SESSION["username"]) && isset($_SESSION["password"]))
	{
		header("Location: nice-html/ltr/pages-profile.php");
		exit;
	}

	
	
}




?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up</title>
	
	
	<meta name="viewport" content="width=device-width", initial-scale="1.0">
	
	<link rel="stylesheet" href="signup.css">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
	
	
	
</head>

<body>
	
	
	<script>
		
		$(document).ready(function(){
			
			$("#signup").click(function(){
				
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
	
		<div class="login">
		
			<p> Already a member? </p> <a href="login.php" id="login"> Login </a>
			
		</div>
		
	</div>
	
	
	<div class="container">
			
			<form method="post">
		
			<div class="signup">
				<h1> Register Now </h1>
				
				<div class="fields name-email">
					
					<input type="text" placeholder="Full Name" id="name" name="name" required>
					
					<input type="email" placeholder="Email" id="email" name="email" required>
					
				</div>
				
				<div class="fields password">
					
					<input type="password" placeholder="Password" id="pass" name="password" required>
					
				</div>
				
				
				<div class="fields confirm-password">
				
					<input type="password" placeholder="Confirm Password" id="conpass" name="conpw" required>
					
				</div>
				
				
				<div class="fields university">
				
					<input list="university" placeholder="Enter your University Name" id="uni" name="university">
					
					<datalist id="university">
					
						<option value="NUST"></option>
						
						<option value="COMSATS"></option>
						
						<option value="LUMS"> </option>
						
						<option value="GIKI"></option>
							
					</datalist>
					
				</div>
				
				<div class="fields degree">
					
					<select id="degree" name="degree" required>
						
						<option value="Bachelors"> Bachelors </option>
						<option value="Masters"> Masters </option>
						<option value="phd"> PhD. </option>
					
					</select>
				
					<input list="domain" placeholder="Domain of Study" id="domain" name="domain">
					
					<datalist id="domain">
						
						<option value="Computer Science"></option>
						<option value="Electrical Engineering"></option>
						<option value="Software Engineering"></option>
						<option value="Chemical Engineering"></option>
						<option value="Business Administration"></option>
						
					</datalist>
					
				</div>
				
				
				<div class="register">
				
					<input type="submit" value="Sign Up" id="signup" onClick="return false">
					
				</div>
				
				<div style="margin-top: 20px;">
					
					<span id="span" style="color: red;">  </span>
					
				</div>
				
				
				
			</div>
				
			</form>
		
		</div>

	
	
	
</body>
</html>
