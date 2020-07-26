@extends('template.main_template')
<!--Расширяем главный шаблон-->
<!--Content of the "quotes" front page-->

@section('content')

<!--content start-->
<h2 id="hello">Лучше, чем цитаты, могут быть только случайно отобранные цитаты.
    Жмякните на кнопку!</h2>


<button type="button" style="margin-left: auto; margin-right: auto;" class="form_button get_random_quotes">Показать пять случайных цитат</button>

<!--content end-->

@endsection

@section('scripts')
<script src="{{ asset('js/get_random_quotes.js') }}"></script>
@endsection