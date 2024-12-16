// Функция для привязки обработчиков событий к модалкам
function bindModalEvents() {
    const openModalBtns = document.querySelectorAll(".openModalBtn");
    const modals = document.querySelectorAll(".modalka");

    // Открытие модального окна
    openModalBtns.forEach((btn) => {
        btn.removeEventListener("click", openModalHandler); // Удаляем старые обработчики
        btn.addEventListener("click", openModalHandler); // Добавляем новые обработчики
    });

    // Закрытие модального окна по нажатию вне его области
    modals.forEach((modal) => {
        modal.removeEventListener("click", closeModalHandler); // Удаляем старые обработчики
        modal.addEventListener("click", closeModalHandler); // Добавляем новые обработчики
    });
}

// Обработчик для открытия модалки
function openModalHandler() {
    const modalId = this.getAttribute("data-modal");
    const modal = document.getElementById(modalId);
    modal.style.display = "flex";
    document.body.classList.add("modalka-open");
}

// Обработчик для закрытия модалки
function closeModalHandler(event) {
    if (event.target === this) {
        this.style.display = "none";
        document.body.classList.remove("modalka-open");
    }
}

bindModalEvents();
export { bindModalEvents };
