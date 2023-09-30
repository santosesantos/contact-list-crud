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
			<h1>New contact</h1>
			<form action="../includes/createContact.inc.php" method="post">
				<label for="inputName">Name</label>
				<input id="inputName" type="text" name="contactName" placeholder="Ethan" required>
				<label for="inputEmail">E-mail</label>
				<input id="inputEmail" type="email" name="contactEmail" placeholder="ethan@example.com" required>
				<button type="submit" name="submit">Create</button>
			</form>
		</div>
	</main>
	<footer>
		<?php include_once "./footer.php" ?>
	</footer>
</body>
</html>