<?php
	$servername = "localhost";
	$username = "user";
	$password = "secret";
	$dbname="school";

$con = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

$con2 = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($con2 -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con2 -> connect_error;
  exit();
}
?>