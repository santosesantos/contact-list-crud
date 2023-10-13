<?php
	function createContact($conn, $name, $email) {
		$sql = "INSERT INTO contacts (name, email) VALUES (?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../pages/index.php?error=stmtfailed");
			exit();
		}
		
		try {
			mysqli_stmt_bind_param($stmt, "ss", $name, $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			
			header("location: ../pages/index.php");
		} catch (Throwable $th) {
			header("location: ../pages/index.php?error=stmtfailed");
		}
		exit();
	}

	function updateContact($conn, $id, $name, $email) {
		$sql = "UPDATE contacts SET name = ?, email = ? WHERE id = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../pages/index.php?error=stmtfailed");
			exit();
		}
		
		try {
			mysqli_stmt_bind_param($stmt, "sss", $name, $email, $id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			
			header("location: ../pages/index.php");
		} catch (Throwable $th) {
			header("location: ../pages/index.php?error=stmtfailed");
		}
		exit();
	}

	function deleteContact($conn, $id) {
		$sql = "DELETE FROM contacts WHERE id = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../pages/index.php?error=stmtfailed");
			exit();
		}
		
		try {
			mysqli_stmt_bind_param($stmt, "s", $id);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
			
			header("location: ../pages/index.php");
		} catch (Throwable $th) {
			header("location: ../pages/index.php?error=stmtfailed");
		}
		exit();
	}

	function getContacts() {
		require_once "dbh.inc.php";

		$sql = "SELECT * FROM contacts;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../pages/index.php?error=stmtfailed");
			exit();
		}

		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		return $resultData;

		mysqli_stmt_close($stmt);
	}

	function getContactById($id) {
		require_once "dbh.inc.php";

		$sql = "SELECT * FROM contacts WHERE id = ?;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../pages/index.php?error=stmtfailed");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "s", $id);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)) {
			return $row;
		} else {
			return false;
		}

		mysqli_stmt_close($stmt);
	}