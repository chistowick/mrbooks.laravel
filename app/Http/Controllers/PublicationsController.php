<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Publication; // Использовать пространство имен модели Publication

class PublicationsController extends Controller
{
    /**
     * Метод для обработки запроса главной страницы со списком публикаций
     */
    public function getList() {
        
        $publications_list = Publication::orderBy('id', 'desc')->get();
        
        return view('publications_list', ['publications_list' => $publications_list]);
    }
    
    /**
     * Метод для обработки запроса отдельной публикации
     */
    public function getOneItem($name) {
        
        $one_publication = Publication::where('name', $name)->first();
        
        // Если публикация не найдена выбрасываем исключение на обработку
        if(!$one_publication) {
            abort(404);
            return;
        }
        
        return view('one_publication', ['one_publication' => $one_publication]);
    }
}
