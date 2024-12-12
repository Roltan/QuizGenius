document
    .getElementById("register")
    .addEventListener("submit", async function (event) {
        event.preventDefault(); // Предотвращаем стандартное поведение формы

        // Собираем данные формы
        const formData = new FormData(this);
        const data = Object.fromEntries(formData.entries());

        // Отправляем запрос на сервер
        const response = await fetch("/api/auth/register", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        });

        const result = await response.json();

        if (result.status == true) {
            // Успешная отправка
            window.location.reload();
        } else {
            // Обрабатываем ошибки валидации
            console.log(result);
            document.body.innerHTML += `
<div class="modalka modalka--wrapper modalka-open" id="modal99" style="display: flex">
    <form class="form">
        <h1>${result.error}</h1>
    </form>
</div>
                `;
            modal = document.getElementById("modal99");
            modal.addEventListener("click", function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                    document.body.classList.remove("modalka-open");
                }
            });
        }
    });
