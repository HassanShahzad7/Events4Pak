<?php


$conn = new MySQLi("localhost", "root", "", "project");

if($conn->connect_error)
{
	die("Error: " . $conn->connect_error);
}


$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];


$q = "INSERT INTO contact VALUES (\"$name\", \"$email\", \"$subject\", \"$message\")";

$added = mysqli_query($conn, $q);

echo "Your response has been recorded.";



?>