<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail; // Для отправки писем(подключение фасада Mail)
use App\Mail\Feedback; // Пространство имен отправляемого класса
use Illuminate\Http\Request; // для работы с Request
use App\Book; // Использовать пространство имен модели Book
use App\Quote; // Использовать пространство имен модели Quote

class AjaxController extends Controller {

    // Метод для обработки AJAX запроса со страницы ЧТО ПОЧИТАТЬ
    public function getWtrList(Request $request) {

        $id_genre = $request->id_genre; // Принятый параметр из ajax GET-запроса

        $recommendations_list = Book::select('author', 'book_name', 'series')
                ->where('id_genre', $id_genre)
                ->orderBy('author')
                ->orderBy('series')
                ->orderBy('id')
                ->get();

        // Converts an array to a JSON representation
        echo json_encode($recommendations_list);
    }

    // Получение набора пяти случайных цитат
    public function getRandomQuotes() {

        // Getting the number of rows in a table with quotes (tquotes)
        $countRow = Quote::count();

        // change to integer
        $countRow = intval($countRow);

        // checking the possibility to filling the array - $random_array
        if ($countRow < 5) {
            return false;
        }

        $i = 1;
        $random_array = array();

        // Filling the $random_array to size of $quantity 
        while (count($random_array) < 5) {

            $curent_number = rand(1, $countRow);

            if (!in_array($curent_number, $random_array)) {

                $random_array[$i] = $curent_number;
                $i++;
            }
        }

        // getting a set of random quotes
        $quotes_list = Quote::select('quote', 'bookname', 'author')
                ->where('id', $random_array[1])
                ->orWhere('id', $random_array[2])
                ->orWhere('id', $random_array[3])
                ->orWhere('id', $random_array[4])
                ->orWhere('id', $random_array[5])
                ->get();

        // Converts an array to a JSON representation
        echo json_encode($quotes_list);
    }

    // Отправка письма с информацией из формы обратной связи
    public function sendFeedbackEmail(Request $request) {

        // If at least one parameter does not exist
        if ((env('RECAPTCHA_SECRET') !== NULL)
                AND ( $request->recaptchaToken !== NULL)) {

            $secret = env('RECAPTCHA_SECRET');
            $client_token = $request->recaptchaToken;

            $url = 'https://www.google.com/recaptcha/api/siteverify';

            $post_fields = array(
                'secret' => $secret,
                'response' => $client_token,
            );
            // Open curl session
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // TRUE для возврата результата в качестве строки
            curl_setopt($ch, CURLOPT_POST, true); // TRUE для использования обычного HTTP POST
            curl_setopt($ch, CURLOPT_URL, $url); // Загружаемый URL
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); // Все данные, передаваемые в HTTP POST-запросе
            // Writing the json response
            $response_json = curl_exec($ch);

            // Close curl session
            curl_close($ch);

            // Decoding json to object
            $response = json_decode($response_json);

            // If the server has confirmed the authenticity of the token, send an email 
            // and inform the js-client about it
            if ($response->success == TRUE) {

                Mail::to('chistowick@yandex.ru')->send(new Feedback($request));
                echo 'true';
            } else {
                echo 'false'; // Если google не подтвердил токен
            }
        } else {
            echo 'false'; // Если токен или секретный ключ пуст
        }
    }

}
