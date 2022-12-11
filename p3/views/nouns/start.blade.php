@extends('templates/master')

@section('title')
    Start Game
@endsection

@section('body')

   <div class='container-fluid text-center'>
        <h1>Der-Die-Das</h1>
        <p>{{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing your German vocabulary.</p>
        <p>When you click 'Start' you'll be given a series of German nouns. Select the correct article for the noun:</p>
        <ul>
            <li>The blue house = der</li>
            <li>The red house = die</li>
            <li>The green house = das</li>
        </ul>
    </div>
        <div class="container-fluid">
            <div class='container text-center'>
                <a href="/noun?noun={{ $noun }}&game={{ $gameNumber }}">
                    <button class='btn btn-primary' name='gameNumber' value='gameNumber'>Start</button>
                </a>
            </div>
    </div>


@endsection
