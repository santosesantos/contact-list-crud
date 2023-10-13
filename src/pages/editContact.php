<?php
	if (!isset($_GET["id"])) {
		header("location: ./index.php");
		exit();
	}

	require_once "../includes/functions.inc.php";

	$contactId = $_GET["id"];


	$result = getContactById($contactId);

	$contactName = $result["name"];
	$contactEmail = $result["email"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact list</title>
	<link rel="stylesheet" href="../assets/css/style.min.css">
</head>
<body>
	<header>
		<?php include_once "./header.php" ?>
	</header>

	<main>
		<div class="main-container">
			<h1>Edit contact</h1>
			<form action="../includes/updateContact.inc.php" method="post">
				<label for="inputId">ID</label>
				<input id="inputId" type="text" name="contactId" placeholder="ID" value="<?php echo $contactId ?>" readonly>
				<label for="inputName">Name</label>
				<input id="inputName" type="text" name="contactName" placeholder="Ethan" value="<?php echo $contactName ?>" required>
				<label for="inputEmail">E-mail</label>
				<input id="inputEmail" type="email" name="contactEmail" placeholder="ethan@example.com" value="<?php echo $contactEmail ?>" required>
				<div class="form-btns">
					<button id="btn-delete" type="button">Delete</button>
					<button type="submit" name="submit">Update</button>
				</div>
			</form>
		</div>
	</main>

	<footer>
		<?php include_once "./footer.php" ?>
	</footer>

	<script src="../assets/js/editPage.js"></script>
</body>
</html>