@extends('templates/master')

@section('title')
    {{ $welcome }}
@endsection

@section('body')

   <div class='container-fluid text-center'>
        <h1>Welcome and willkommen!</h1>
        <p>{{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing your German vocabulary.</p>
    </div>

    <div class="container-fluid">
        <div class='container text-center'>
            <a href='/nouns/play' type='button' class='btn btn-primary'>Play Der-Die-Das</a>
        </div>
    </div>
@endsection
