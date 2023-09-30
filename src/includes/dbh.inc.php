<?php
	$serverName = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "contact_list_crud";

	try {
		$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
	} catch (Throwable $th) {
		header("location: ../pages/index.php?error=stmtfailed");
		die("Connection failed: " . mysqli_connect_error());
		exit();
	}

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}