@extends('template.main_template') <!--Расширяем главный шаблон-->

<!--Content of the "one_publication" page-->

@section('content')
<!--content start-->

<?php if ($one_publication['type'] == 'Articles') : ?>

    <h2><?= $one_publication['title'] ?></h2>

    <?= $one_publication['short_description'] ?>

    <?= $one_publication['text'] ?>

    <p style="text-align: right;"><?= $one_publication['datestamp'] ?></p>

<?php endif; ?>

<?php if ($one_publication['type'] == 'Reviews') : ?>

    <img class="img-one-review mr-4 mb-2" src="/<?= $one_publication['main_image'] ?>">

    <h2><?= $one_publication['title'] ?></h2>

    <?= $one_publication['text'] ?>

    <p style="text-align: right;"><?= $one_publication['datestamp'] ?></p>

<?php endif; ?>
    
    <h4 class="back_href">
        <a href="{{ route('publications-list')}}">Вернуться на главную страницу</a>
    </h4>

<!--content end-->
@endsection