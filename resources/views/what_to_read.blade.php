@extends('template.main_template')
<!--Расширяем главный шаблон-->
<!--Content of the "what to read" page-->

@section('content')

<!--content start-->
<div class="p-0 m-0" id="wtr-select-list">

    <div class="row justify-content-center">
        <div class="col col-md-11 col-xl-10 text-center mb-4">
            <h2 id="hello">Выберите интересующий жанр, <br>а я постараюсь посоветовать хорошую книгу.</h2>
        </div>
    </div>

    <div class="row justify-content-center justify-content-md-start">
        <div class="col-11 col-sm-9 col-md-6">
            <div class="card mb-4">
                <div class="card-header list-group-item-info">Фантастика</div>
                <div class="list-group list-group-flush">
                    <button type="button" class="list-group-item list-group-item-action" value="8">Научная фантастика, детектив</button>
                    <button type="button" class="list-group-item list-group-item-action" value="4" checked>Научная фантастика</button>
                    <button type="button" class="list-group-item list-group-item-action" value="11">Социальная научная фантастика</button>
                    <button type="button" class="list-group-item list-group-item-action" value="9">Юмористическая научная фантастика</button>
                </div>
            </div>
        </div>
        <div class="col-11 col-sm-9 col-md-6">
            <div class="card mb-4">
                <div class="card-header list-group-item-info">Фэнтези</div>
                <div class="list-group list-group-flush">
                    <button type="button" class="list-group-item list-group-item-action" value="2">Подростковое фэнтези</button>
                    <button type="button" class="list-group-item list-group-item-action" value="5">Городское фэнтези</button>
                    <button type="button" class="list-group-item list-group-item-action" value="1">Эпическое фэнтези</button>
                    <button type="button" class="list-group-item list-group-item-action" value="3">Юмористическое фэнтези</button>
                </div>
            </div>
        </div>
        <div class="col-11 col-sm-9 col-md-6">
            <div class="card mb-4">
                <div class="card-header list-group-item-info">Реализм</div>
                <div class="list-group list-group-flush">
                    <button type="button" class="list-group-item list-group-item-action" value="10">Историко-приключенческий роман</button>
                    <button type="button" class="list-group-item list-group-item-action" value="7">Классический реализм</button>
                    <button type="button" class="list-group-item list-group-item-action" value="6">Юмористическая повесть</button>
                </div>
            </div>
        </div>
    </div>

    <form>{{csrf_field()}}</form>

    <div class="row text-center">
        <div class="col">
            <button type="button" class="btn-lg btn-success" id="get_wtr_list">
                Готово</button>
        </div>
    </div>

</div>

<!-- Recommendations... -->
<div class="p-0 m-0" id="recommendations-list" style="display: none;">

    <div class="row justify-content-center">
        <div class="col-9 col-sm-8 col-md-12">
            <h2 id="hello_wtr_result" class="mb-4">Рекомендую почитать следующие книги:</h2>
        </div>
    </div>

    <!-- Таблица с рекомендациями -->
    <div class="row justify-content-center mb-4">
        <div class="col-12 col-sm-11 col-md-10 col-lg-9 col-xl-8" id="wtr-result-table-container">

        </div>
    </div>

    <div class="row text-center">
        <div class="col">
            <button type="button" class="btn-lg btn-success" id="btn-to-wtr-front">
                Выбрать другой жанр</button>
        </div>
    </div>

</div>

<!--content end-->

@endsection

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/get_wtr_list.js') }}"></script>
@endsection