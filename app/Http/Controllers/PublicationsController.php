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
        
        $publications_list = Publication::all();
        
        return view('publications_list', ['publications_list' => $publications_list]);
    }
    
    /**
     * Метод для обработки запроса отдельной публикации
     */
    public function getOneItem($id) {
        
        $one_publication = Publication::find($id);
        
        return view('one_publication', ['one_publication' => $one_publication]);
    }
}
