@extends('template.main_template')
<!--Расширяем главный шаблон-->
<!--Content of the "quotes" front page-->

@section('content')

<!--content start-->
<!-- Div, содержимое которого переписывается скриптом js -->
<div id="quotes-target-div">
    <div class="row mb-3">
        <div class="col">
            <h2>Лучше, чем цитаты, могут быть только случайно отобранные цитаты.
                Жмякните на кнопку!</h2>
        </div>
    </div>
</div>

<form>{{ csrf_field() }}</form>

<div class="row text-center">
    <div class="col">
        <button type="button" class="btn-lg btn-success" id="get_random_quotes">
            Показать пять случайных цитат</button>
    </div>
</div>

<!--content end-->

@endsection

@section('scripts')
<script src="{{ asset('js/get_random_quotes.js') }}"></script>
@endsection