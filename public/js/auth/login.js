import { bindModalEvents } from "./modal.js";

document
    .getElementById("login")
    .addEventListener("submit", async function (event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        // Собираем данные формы
        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        // Отправляем запрос на сервер
        fetch("/api/auth/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                return response.json();
            })
            .then((result) => {
                if (result.status == true) {
                    // Успешная отправка
                    window.location.reload();
                } else {
                    // Обрабатываем ошибки валидации
                    console.log(result);
                    document.body.innerHTML += `
                        <div class="modalka modalka--wrapper modalka-open" id="modal99" style="display: flex">
                            <form class="form">
                                <h1>${result.message}</h1>
                            </form>
                        </div>
                    `;
                    bindModalEvents();
                }
            });
    });
