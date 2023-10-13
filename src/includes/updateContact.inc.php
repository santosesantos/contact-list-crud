<?php
	if (isset($_POST["submit"])) {
		$contactId = $_POST["contactId"];
		$contactName = $_POST["contactName"];
		$contactEmail = $_POST["contactEmail"];

		require_once "dbh.inc.php";
		require_once "functions.inc.php";

		updateContact($conn, $contactId, $contactName, $contactEmail);
	} else {
		header("location: ../pages/index.php");
		exit();
	}
	