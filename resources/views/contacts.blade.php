@extends('template.main_template')
<!--Content of the "contacts" page-->

@section('content')
<!--content start-->

<!--Settings for reCAPTHA-->
<?php $data_sitekey = '6LfjG_cUAAAAAJzmTo8JzPwqM2wC3C7ZE1Lezhzn'; ?>

<h3 style="text-align: center;">Если у Вас есть вопрос или предложение,
    пожалуйста, свяжитесь со мной через эту форму</h3>

<div id="feedback_block">

    <div class="feedback_elem"><label for="subj">Тема письма: </label>
        <input type="text" id="subj" name="feedback_message_subject" placeholder="Укажите тему письма" maxlength="100">
    </div>

    <div class="feedback_elem"><label for="textArea">Ваше сообщение: </label>
        <textarea id="textArea" name="feedback_message" rows="10" maxlength="2000" placeholder="Введите текст вашего сообщения"></textarea>
    </div>

    <div id="wrap_recaptha_and_button">
        <div class="g-recaptcha" data-sitekey="<?= $data_sitekey ?>"></div>

        <button class="form_button" id="feedback_button" type="button" value="Отправить">
            Отправить</button>
    </div>
</div>

<form>{{csrf_field()}}</form>

<div id="quill_block"><img id="quill" src="{{asset('/img/quill.png')}}"></div>
<div style="clear: both"></div>

<!--content end-->

@endsection

@section('scripts')
<script src="{{ asset('js/send_feedback_form.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
@endsection