@extends('template.main_template')
<!--Расширяем главный шаблон-->
<!--Content of the "what to read" page-->

@section('content')

<!--content start-->
<div id="wtr_select_genre">
    <h2 id="hello">Выберите интересующий жанр, <br>а я постараюсь посоветовать хорошую книгу.</h2>

    <p><b>Фантастика</b></p>
    <ul>
        <li><label><input name="id_genre" type="radio" value="4" checked>Научная фантастика</label></li>
        <li><label><input name="id_genre" type="radio" value="8">Научная фантастика, детектив</label></li>
        <li><label><input name="id_genre" type="radio" value="11">Социальная научная фантастика</label></li>
        <li><label><input name="id_genre" type="radio" value="9">Юмористическая научная фантастика</label></li>
    </ul>

    <p><b>Фэнтези</b></p>
    <ul>
        <li><label><input name="id_genre" type="radio" value="5">Городское фэнтези</label></li>
        <li><label><input name="id_genre" type="radio" value="2">Подростковое фэнтези</label></li>
        <li><label><input name="id_genre" type="radio" value="1">Эпическое фэнтези</label></li>
        <li><label><input name="id_genre" type="radio" value="3">Юмористическое фэнтези</label></li>
    </ul>

    <p><b>Реализм</b></p>
    <ul>
        <li><label><input name="id_genre" type="radio" value="10">Историко-приключенческий роман</label></li>
        <li><label><input name="id_genre" type="radio" value="7">Классический реализм</label></li>
        <li><label><input name="id_genre" type="radio" value="6">Юмористическая повесть</label></li>
    </ul>

    </br><input class="form_button get_wtr_list" type="button" value="Готово">
</div>
<div id="recommendations_list"></div>

<!--content end-->

@endsection

@section('scripts')
<script src="{{ asset('js/get_wtr_list.js') }}"></script>
@endsection