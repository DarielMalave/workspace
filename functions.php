<?php
function db_iconnect($db) {
	$hostname="localhost";
	$username = "root";
	$password = "";
	$mysqli = new mysqli($hostname,$username,$password,$db);
	if (mysqli_connect_error())
	{
		die("Something went wrong connecting to $db".mysqli_connect_error());
	}
	return $mysqli;
}