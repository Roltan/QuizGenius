const openModalBtns = document.querySelectorAll(".openModalBtn");
const modals = document.querySelectorAll(".modalka");

// Открытие модального окна
openModalBtns.forEach((btn) => {
	btn.addEventListener("click", function () {
		const modalId = btn.getAttribute("data-modal");
		const modal = document.getElementById(modalId);
		modal.style.display = "flex";
		document.body.classList.add("modalka-open");
	});
});

// Закрытие модального окна по нажатию вне его области
modals.forEach((modal) => {
	modal.addEventListener("click", function (event) {
		if (event.target === modal) {
			modal.style.display = "none";
			document.body.classList.remove("modalka-open");
		}
	});
});
