@extends('template.main_template')
<!--Расширяем главный шаблон-->

<!--Content of the "publications list" page-->

@section('content')
<!--content start-->

@foreach($publications_list as $publication)

@if($publication['type'] == 'Articles')

<div class="card p-3 p-md-4 mt-4 {{ $publication['type'] }}">
    <div class="row justify-content-center">
        <div class="col-10 text-center mt-3">
            <a href="{{ route('publication', [ 'name' => $publication['name'] ]) }}">
                <h3 class="card-title">{{ $publication['title'] }}</h3>
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <p>{!! $publication['short_description'] !!}</p>
        </div>
    </div>

    <div class="row text-right">
        <div class="col-8 ml-auto mt-2">
            <h5 class="text-muted">{{ $publication['datestamp'] }}</h5>
        </div>
    </div>

</div>

@endif

@if($publication['type'] == 'Reviews')

<div class="card pr-4 pb-2 mt-3 {{ $publication['type'] }}">

    <div class="row justify-content-center">
        <div class="col-12 col-sm-4 mt-0 mt-sm-4 mt-md-0">
            <a href="{{ route('publication', [ 'name' => $publication['name'] ]) }}">
                <img class="card-img-top rounded img-reviews" src="{{ asset($publication['main_image']) }}">
            </a>
        </div>
        <div class="col-12 col-sm-8">

            <div class="row justify-content-center">
                <div class="col-11 text-center mt-3">
                    <a href="{{ route('publication', [ 'name' => $publication['name'] ]) }}">
                        <h3 class="card-title">{{ $publication['title'] }}</h3>
                    </a>
                </div>
            </div>

            <div class="row text-right">
                <div class="col-8 ml-auto mb-3 mt-0">
                    <h6>({{ $publication['author'] }})</h6>
                </div>
            </div>

            <div class="row no-gutters justify-content-center">

                <div class="col-10 col-sm-6">
                    <ul class="liked pl-1 pr-1">{!! $publication['liked'] !!}</ul>
                </div>

                <div class="col-10 col-sm-6">
                    <ul class="disliked pl-1 pr-1">{!! $publication['disliked'] !!}</ul>
                </div>

            </div>

            <div class="row text-right">
                <div class="col-8 ml-auto mt-2">
                    <h5 class="text-muted">{{ $publication['datestamp'] }}</h5>
                </div>
            </div>

        </div>
    </div>

</div>

@endif

@endforeach

<!--content end-->
@endsection