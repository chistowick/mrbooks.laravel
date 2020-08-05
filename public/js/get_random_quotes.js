"use strict";

// Определяем блок, в который будем выводить цитаты
const quotesTargetDiv = document.querySelector('#quotes-target-div');

// Кнопка 'Показать пять случайных цитат'
const btnGetRandomQuotes = document.querySelector('#get_random_quotes');

// Устанавливаем обработчик клика на кнопку 'Показать пять случайных цитат'
window.onload = btnGetRandomQuotes.addEventListener("click", getRandomQuotes);

// Requests and outputs a set of random quotes
function getRandomQuotes() {

    const url = 'quotes/ajax';

    // Получаем защитный токен Laravel из скрытого input
    const laravelToken = document.querySelector('input[name="_token"]').value;

    // Формируем тело POST-запроса 
    let postData = new FormData();
    postData.append('_token', laravelToken);

    // Создаем соединение
    let request = new XMLHttpRequest();

    // Request setting
    request.open('POST', url);
    request.responseType = 'json';

    // Sending request
    request.send(postData);

    // If connection error
    request.onerror = function () {
        alert(`Ошибка соединения`);
    };
    // When the server response will be received
    request.onload = function () {

        // Analysis of HTTP response status
        if (request.status != 200) {
            // Print error status and error description
            alert(`Ошибка ${request.status}: ${request.statusText}`);

        } else { // if all OK

            // Writing the result to a variable
            let responseObj = request.response;

            // Print the content
            printQuotes(responseObj);

            // Scroll up
            scrollUp();
        }
    };

}

// Print the content
function printQuotes(responseObj) {

    // Clear div #quotes-target-div
    quotesTargetDiv.innerHTML = ``;

    // Set 'hello'
    const hello = `<div class="row justify-content-center mb-3">
                        <div class="col-8 col-sm-12">
                            <h2>Пять случайно отобранных цитат</h2>
                        </div>
                    </div>`;

    // Add 'hello' to #quotes-target-div
    quotesTargetDiv.insertAdjacentHTML("afterBegin", hello);

    let text = ``;

    // Iterate the object's properties and insert quotes in HTML
    for (let key in responseObj) {
        text += `<div class="quotes">${responseObj[key].quote}<br>`;
        text += `<p class="source">${responseObj[key].bookname}</p>`;
        text += `<p class="source">${responseObj[key].author}</p>`;
        text += `</div>`;
    }

    // Insert text to the end of #quotes-target-div
    quotesTargetDiv.insertAdjacentHTML("beforeEnd", text);
}

// Scroll up smoothly
function scrollUp() {

    // Получаем текущую высоту #header
    let headerHeight = document.getElementById('header').offsetHeight;

    window.scrollTo({
        top: headerHeight,
        behavior: "smooth"
    });
}