const btnDelete = document.getElementById("btn-delete")
const inputId = document.getElementById("inputId")


btnDelete.addEventListener("click", (evt) => {
	evt.preventDefault()
	window.location.href = `../includes/deleteContact.inc.php?contactId=${inputId.value}`;
})