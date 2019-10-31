<?php

session_start();

if(isset($_SESSION["username"]) && isset($_SESSION["password"]))
	
{ ?>
	

<html>

	<body>
	
		<h1> Hello World </h1>
		
		<p> Testing </p>
	
		
	</body>
	

</html>

	
<?php	exit;
}

header("Location: contact.html");
exit;



?>
