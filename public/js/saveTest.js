import { bindModalEvents } from "./auth/modal.js";

document.getElementById("saveTest").addEventListener("click", function (event) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    const buttonIMG = document
        .querySelector("header")
        .querySelector(".button__image");
    // если авторизован
    if (buttonIMG) {
        // Собираем данные из формы
        const title = document.getElementById("title").value;
        const topic = document.getElementById("topic").value;
        const onlyUser = document.getElementById("only_user").checked;

        // Собираем вопросы
        const quests = [];
        const questElements = document.querySelectorAll(".quest__edit");
        questElements.forEach((element) => {
            const id = parseInt(element.id.replace("quest", ""), 10);
            const type = element
                .querySelector(".quest")
                .classList[1].replace("quest__", "");
            quests.push({ id, type });
        });

        // Создаем объект данных для отправки
        const data = {
            title: title,
            topic: topic,
            only_user: onlyUser,
            quest: quests,
        };

        // Отправляем PUT-запрос на сервер
        fetch("/api/test/create", {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(data),
        })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                if (data.status) {
                    window.location.href = "/profile";
                } else {
                    document.body.innerHTML += `
                        <div class="modalka modalka--wrapper modalka-open" id="modal99" style="display: flex">
                            <form class="form">
                                <h1>${data.message}</h1>
                            </form>
                        </div>
                    `;
                    bindModalEvents();
                }
            })
            .catch((error) => {
                console.error("Error:", error);
            });
    }
    // если не авторизован
    else {
        document.body.innerHTML += `
            <div class="modalka modalka--wrapper modalka-open" id="modal99" style="display: flex">
                <form class="form">
                    <h1>Чтоб создать тест, зарегистрируйтесь или войдите в аккаунт</h1>
                </form>
            </div>
        `;
        bindModalEvents();
    }
});
