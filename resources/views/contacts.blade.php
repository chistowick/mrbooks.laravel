@extends('template.main_template')
<!--Content of the "contacts" page-->

@section('content')
<!--content start-->

<div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-10 mb-4">
        <h3 class="text-center">Если у Вас есть вопрос или предложение, пожалуйста, свяжитесь со мной через эту форму</h3>
    </div>
</div>

<div class="row justify-content-center no-gutters">
    <div class="col-12 col-sm-10 col-md-8 col-lg-7">
        <div class="card">
            <div class="card-body">

                <div class="form-group row no-gutters">
                    <label class="col-12 col-form-label" for="subj">Тема письма: </label>

                    <div class="col-12">
                        <input class="form-control" type="text" id="subj" name="feedback_message_subject" placeholder="Укажите тему письма" maxlength="100" required autofocus>
                    </div>
                </div>

                <div class="form-group row no-gutters">
                    <label class="col-12 col-form-label" for="text-area">Ваше сообщение: </label>

                    <div class="col-12">
                        <textarea class="form-control" id="text-area" name="feedback_message" rows="10" maxlength="2000" placeholder="Введите текст вашего сообщения" required></textarea>
                    </div>
                </div>

                <div class="form-group row no-gutters">
                    <div class="col-12">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    </div>
                </div>

                <div class="form-group row no-gutters">
                    <div class="col-12">
                        <button class="btn-lg btn-success" id="feedback_button" type="button">Отправить</button>
                    </div>
                </div>

                <form>{{ csrf_field() }}</form>

            </div>
        </div>
    </div>

    <div class="col-lg-5 d-none d-lg-block">
        <div id="quill_block">
            <img id="quill" src="{{asset('/img/quill.png')}}">
        </div>
    </div>
</div>

<!--content end-->

@endsection

@section('scripts')
<script src="{{ asset('js/send_feedback_form.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
@endsection