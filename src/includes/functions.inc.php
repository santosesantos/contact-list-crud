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