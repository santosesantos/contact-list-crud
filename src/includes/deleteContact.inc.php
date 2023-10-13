<?php
	if (isset($_GET["contactId"])) {
		$contactId = $_GET["contactId"];

		require_once "dbh.inc.php";
		require_once "functions.inc.php";

		deleteContact($conn, $contactId);
	} else {
		header("location: ../pages/index.php");
		exit();
	}
	