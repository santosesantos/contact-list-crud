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
			<h1>Contacts</h1>
			<table>
				<thead>
					<tr>
						<td>Name</td>
						<td>E-mail</td>
					</tr>
				</thead>
				<tbody>
					<?php
						require_once "../includes/functions.inc.php";

						$contacts = getContacts();

						while ($row = mysqli_fetch_assoc($contacts)) {
							?> <tr id="<?php echo $row["id"] ?>" class="table-row">
								<td>
									<?php
										echo $row["name"];
									?>
								</td>
								<td>
									<?php
										echo $row["email"];
									?>
								</td>
							</tr>
							<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</main>
	<footer>
		<?php include_once "./footer.php" ?>
	</footer>

	<script src="../assets/js/indexPage.js"></script>
</body>
</html>