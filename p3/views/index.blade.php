@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('content')

        <h2>Welcome and willkommen!</h2>

    <p>
        {{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing your German vocabulary.
    </p>

@endsection
