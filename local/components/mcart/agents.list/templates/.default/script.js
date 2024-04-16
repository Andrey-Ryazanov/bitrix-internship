BX.ready(function() {
    /*
    1. Спомощью document.querySelectorAll получить все DOM-элементы с классом star
    2. Повесить обработчик события на click
    Пример: BX.bind(element, "click", clickStar);
     */
    let starButtons = document.querySelectorAll('.star');
    starButtons.forEach(function(button) {
        button.addEventListener('click', clickStar);
    });
});

function clickStar(event) {
    event.preventDefault();

    /*
    Получить agentID, в template.php добавьте тегу в классов star атрибут dataset
    cо значением ID элемента Агента
    (https://developer.mozilla.org/en-US/docs/Web/API/HTMLElement/dataset)
     */
    let agentID = event.currentTarget.dataset.agentId;

    if (agentID) { // если ID есть, то делаем ajax-запрос
        BX.ajax // https://dev.1c-bitrix.ru/api_help/js_lib/ajax/bx_ajax_runcomponentaction.php
            .runComponentAction(
                "mcart:agents.list", // название компонента
                "clickStar", // название метода, который будет вызван из class.php
                {
                    mode: "class", //это означает, что мы хотим вызывать действие из class.php
                    data: {
                        agentID: agentID // параметры, которые передаются на бэк
                    },
                }
            )
            .then(
                function(response) {
                    console.log(response.data);
                    let data = response.data;
                    if (data['action'] == 'success') {
                        let starElement = document.querySelector('.star[data-agent-id="' + agentID + '"]');
                        if (starElement) {
                            // Проверяем, есть ли у элемента класс "active"
                            if (starElement.classList.contains('active')) {
                                // Если есть, удаляем его
                                starElement.classList.remove('active');
                            } else {
                                // Если нет, добавляем
                                starElement.classList.add('active');
                            }
                        }
                    } else {
                        console.error('Error occurred:', response.errors);
                    }
                }
            )
            .catch(
                function(response) {
                    console.error('Error occurred:', response.errors);
                }
            );
    }
}
