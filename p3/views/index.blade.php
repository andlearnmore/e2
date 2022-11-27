@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('content')
   <div class='container-fluid'>
        <h1>Welcome and willkommen!</h1>
        <div class='container text-center'>
            <p>
                {{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing your German vocabulary.
            </p>
        </div>
    </div>
@endsection

@section('body')
    <div class="container-fluid">
        <div class='container text-center'>
            <a href='/nouns/play' type='button' class='btn btn-primary'>Play Der-Die-Das</button>
        </div>
    </div>
@endsection

{{-- TODO: Figure out why more buttons are showing up! --}}