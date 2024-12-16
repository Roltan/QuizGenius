import { bindModalEvents } from "./modal.js";

function resetQuest(button) {
    // Найти родительский элемент .quest__edit
    var questElement = button.closest(".quest__edit");
    var modalElement = document.getElementById(
        questElement.querySelector(".openModalBtn").dataset.modal
    );

    // Определить тип
    var type = questElement
        .querySelector(".quest")
        .className.split(" ")[1]
        .split("__")[1];

    // Получить значение топика
    var topic = document.getElementById("topic").value;

    // Отправить AJAX-запрос
    fetch("/quest/generate", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            type: type,
            topic: topic,
        }),
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
        .catch((error) => console.error("Error:", error));
}

window.resetQuest = resetQuest;
