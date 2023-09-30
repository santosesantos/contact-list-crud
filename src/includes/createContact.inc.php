<?php
	if (isset($_POST["submit"])) {
		$contactName = $_POST["contactName"];
		$contactEmail = $_POST["contactEmail"];

		require_once "dbh.inc.php";
		require_once "functions.inc.php";

		createContact($conn, $contactName, $contactEmail);
	} else {
		header("location: ../pages/index.php");
		exit();
	}
	