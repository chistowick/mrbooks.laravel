<!DOCTYPE html>
<html>
<!--Top part of the main template-->

<head>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(61775458, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/61775458" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <!--Строка для того, чтобы телефоны не увеличивали шрифт-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="мой читательский дневник, блог о книгах, книжный блог">
    <meta name="description" content="Этот блог - мой читательский дневник, 
          где я собираюсь делиться своими впечатлениями о прочитанных книгах">

    <title>Мой читательский дневник</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles of Bootstrap-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--Styles and favicon-->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <!--End Styles-->

</head>

<body>
    <div id="wrapper">

        <div id="header"></div>

        <div id="mainMenu">
            <div class="button"><a href="{{ route('publications-list') }}">СТАТЬИ</a></div>
            <div class="button"><a href="{{ route('about-me') }}">О БЛОГЕ</a></div>
            <div class="button"><a href="{{ route('what-to-read') }}">ЧТО ПОЧИТАТЬ</a></div>
            <div class="button"><a href="{{ route('quotes') }}">ЦИТАТЫ</a></div>
            <div class="button"><a href="{{ route('contacts') }}">КОНТАКТЫ</a></div>
        </div>

        <div id="content">
            <!--Start content-->

            @yield('content')
            <!-- Имя включаемой секции -->

            <!--Bottom part of the main template-->
        </div>
        <!--End content -->
    </div>
    <!--End wrapper -->
    <div id="footer">
        <p id="copy">&copy; 2020 Анатолий Чиняев</p>
    </div>

    @hasSection('scripts')

    @yield('scripts')

    @endif

</body>

</html>