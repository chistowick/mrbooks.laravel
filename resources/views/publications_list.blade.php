@extends('template.main_template') <!--Расширяем главный шаблон-->

<!--Content of the "publications list" page-->

@section('content')
<!--content start-->

<?php foreach ($publications_list as $publication) : ?> 

    <?php if ($publication['type'] == 'Articles') : ?>

        <div class="publications <?= $publication['type'] ?>">
            <br><hr><br>

            <a href="{{route('publication', [ 'id' => $publication['id'] ])}}">
                <h3 class="title"><?= $publication['title'] ?></h3>
            </a>

            <p style="margin-top: 16px;"><?= $publication['short_description'] ?></p>

            <p style="text-align: right;"><?= $publication['datestamp'] ?></p>

            <hr style="clear: both"><br></div>

    <?php endif; ?>

    <?php if ($publication['type'] == 'Reviews') : ?>

        <div class="publications <?= $publication['type'] ?>">
            <br><hr><br>

            <a href="{{route('publication', [ 'id' => $publication['id'] ])}}">
                <img class="imgReviews" src="{{ asset($publication['main_image']) }}">
            </a>

            <a href="{{route('publication', [ 'id' => $publication['id'] ])}}">
                <h3 class="title"><?= $publication['title'] ?></h3>
            </a>

            <span class="author">(<?= $publication['author'] ?>)</span>

            <div class="liked-disliked">
                <ul class="liked"><?= $publication['liked'] ?></ul>
                <ul class="disliked"><?= $publication['disliked'] ?></ul>
            </div>

            <br>
            <p class="datestamp"><?= $publication['datestamp'] ?></p>

            <hr style="clear: both"><br>
        </div>

    <?php endif; ?>

<?php endforeach; ?>

<!--content end-->
@endsection