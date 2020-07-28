"use strict";

let global = {};

const wtrSelectList = document.querySelector('#wtr-select-list');
const recommendationsList = document.querySelector('#recommendations-list');
const targetDiv = document.querySelector('#wtr-result-table-container');

let oldButton;
let newButton;

// По клику на кнопке 'Выбрать другой жанр'
$(document).ready(function () {
    $('#btn-to-wtr-front').click(function () {

        // Показать страницу выбора жанра
        showFrontPage();

    });
});

// По клику на кнопке 'Готово' отправляем AJAX запрос
$(document).ready(function () {
    $('.get_wtr_list').click(function () {

        if (!global.idGenre) {

            alert('Вы не выбрали жанр!');
            return;
        }

        // Отправляем запрос на поиск рекомендаций и обрабатываем его
        getWtrList();

    });
});

// По клику на элемент списка, активируем его, деактивируем другие и запоминаем value активногоэлемента
$(document).ready(function () {
    $('.list-group-item').click(function () {

        // Запоминаем старую активную кнопку, и записываем новую
        oldButton = newButton || null;
        newButton = $(this);

        // Делаем новую кнопку активной, а старую неактивной
        if (oldButton) {
            oldButton.removeClass('active');
        }
        newButton.addClass('active');

        // Определяем атрибут value кнопки списка, которая отмечена и записываем его в переменную
        global.idGenre = $(this).attr('value');

    });
});

// Запрашиваем и выводим список 'what-to-read'
function getWtrList() {

    // Задаем URL
    const url = new URL('http://mrbooks.laravel/what-to-read/ajax');

    // Получаем защитный токен Laravel из скрытого input
    const laravelToken = document.querySelector('input[name="_token"]').value;

    // Формируем тело POST-запроса 
    let postData = new FormData();
    postData.append('id_genre', global.idGenre);
    postData.append('_token', laravelToken);

    // Создаем соединение
    let request = new XMLHttpRequest();

    // Настраиваем запрос
    request.open('POST', url);
    request.responseType = 'json';

    // Отправка запроса
    request.send(postData);

    // В случае ошибки
    request.onerror = function () {
        alert(`Ошибка соединения`);
    };
    // Когда ответ сервера будет загружен
    request.onload = function () {

        // Анализируем статус HTTP ответа
        if (request.status != 200) {
            // Print error status and error description
            alert(`Ошибка ${request.status}: ${request.statusText}`);

        } else { // Если всё ОК

            // Записываем ответ в объект для дальнейшей работы
            let responseObj = request.response;

            // Если вернулся пустой массив, выводим сообщение и выходим из функции
            if (responseObj.length === 0) {
                alert(`К сожалению, по вашему запросу ничего не найдено`);
                return;
            }

            // Формируем то, что должен увидеть пользователь
            showWtrList(responseObj);

            scrollUp(130);
        }
    };

}

// Показываем пользователю список выбора жанра
function showFrontPage() {

    // Показать div #wtr-select-list
    wtrSelectList.style.display = "block";

    // Очистить targetDiv
    targetDiv.innerHTML = ``;

    // Скрыть div #recommendations-list
    recommendationsList.style.display = "none";

    scrollUp(130);
}

// Scroll up smoothly
function scrollUp(top) {
    window.scrollTo({
        top: top,
        behavior: "smooth"
    });
}

// Show what-to-read list
function showWtrList(responseObj) {

    // Hide div #wtr-select-list
    wtrSelectList.style.display = "none";

    // Show div #recommendations-list
    recommendationsList.style.display = "block";

    let text = ``;
    let lastAuthor = 'anyone';

    // Add #table_header to text
    text += `<table class="table table-hover">`;
    text += `<thead class="thead-light">
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Серия</th>
                </tr>
            </thead>`;
    text += `<tbody>`;

    // Get object properties and add them to text
    for (let key in responseObj) {

        // Добавляем пустую строку и новую группу с именем нового автора, если он изменился
        if (responseObj[key].author != lastAuthor) {
            text += `<tr class="bg-white">
                        <td colspan='2'></td>
                    </tr>
                    <thead class="thead-light">
                        <tr class="table-primary">
                            <th colspan='2'>${responseObj[key].author}</th>
                        </tr>
                    </thead>`;
        }

        text += `<tr>
                    <td>${responseObj[key].book_name}</td>
                    <td>${responseObj[key].series || ` `}</td>
                </tr>`;

        lastAuthor = responseObj[key].author;
    }

    text += `</table>`;

    // Print 'text' into targetDiv
    targetDiv.insertAdjacentHTML("beforeEnd", text);
}