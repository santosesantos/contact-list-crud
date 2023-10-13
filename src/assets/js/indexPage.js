const rows = document.querySelectorAll(".table-row");

rows.forEach(element => {
	element.addEventListener("click", () => {
		window.location.href = `./editContact.php?id=${element.id}`;
	});
});