import { bindModalEvents } from "../modal.js";

function saveQuest(button, questType) {
    event.preventDefault(); // Предотвращаем стандартное поведение формы

    // Находим форму, связанную с этой кнопкой
    const form = button.closest("form");
    let modalElement = form.closest(".modalka");
    const questId = modalElement.id.replace("questEdit", "");
    let questElement = document.querySelector(`#quest${questId}`);

    // сбор данных из формы
    let requestBody = {
        topic: document.querySelector("#topic").value,
        type: questType,
        quest: form.querySelector(`#questEdit${questId}Quest`).value,
    };

    // Определяем тип вопроса и формируем тело запроса
    switch (questType) {
        case "choice":
            requestBody = {
                ...requestBody,
                ...getChoiceRequestBody(form, questId),
            };
            break;
        // Добавьте другие типы вопросов здесь
        default:
            console.error("Неизвестный тип вопроса:", questType);
            return;
    }

    // Отправляем запрос на сервер
    fetch(`/quest/create`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(requestBody),
    })
        .then((response) => response.text())
        .then((data) => {
            // Создать DOM-элемент из строки
            var tempDiv = document.createElement("div");
            tempDiv.innerHTML = data;

            // Найти новые элементы
            var newQuestElement = tempDiv.querySelector(".quest__edit");
            var newModalElement = tempDiv.querySelector(".modalka");

            // Заменить старые элементы новыми
            questElement.replaceWith(newQuestElement);
            modalElement.replaceWith(newModalElement);

            bindModalEvents();
        })
        .catch((error) => {
            console.error("Ошибка:", error);
            alert("Произошла ошибка при отправке запроса");
        });
}

// Функция для формирования тела запроса для типа вопроса "choice"
function getChoiceRequestBody(form, questId) {
    const choices = form.querySelectorAll(".input__radio, .input__checkbox");
    const correct = [];
    const uncorrect = [];

    choices.forEach((choice) => {
        const toggle = choice.querySelector(".toggle");
        const value = choice.querySelector(
            `#questEdit${questId}choice${toggle.id.replace(
                "questEdit" + questId + "choice",
                ""
            )}value`
        ).value;

        if (toggle.checked) {
            correct.push(value);
        } else {
            uncorrect.push(value);
        }
    });

    return {
        correct: correct,
        uncorrect: uncorrect,
    };
}

window.saveQuest = saveQuest;
