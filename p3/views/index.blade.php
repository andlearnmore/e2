@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('body')

    <div class='container-fluid'>
        <div class='row'>
            <div class='col-sm'>
                <div class='alert alert-info' role='alert'>
                    <h1>Der-Die-Das</h1>
                    <p>{{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing your German vocabulary.</p>
                    <p>When you click 'Start' you'll be given a series of German nouns. Select the correct article for the noun:</p>
                    <div>
                        <ul>
                            <li>The blue house = der</li>
                            <li>The red house = die</li>
                            <li>The green house = das</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class='row'>
        <div class='col'>
            <a href="/noun?noun={{ $noun }}&game={{ $gameNumber }}">
                <button class='btn btn-primary' name='gameNumber' value='gameNumber'>Start</button>
            </a>
        </div>
    </div> --}}
    
    <div class='row'>
        <div class='col'>
            <form method='POST' action='/score-play'>
                <div> 
                <input type='hidden' name='game-number' value='{{ $gameNumber }}'>
                <input type='hidden' name='article' value='{{ $gameWord['article'] }}'>
                <input type='hidden' name='noun' value='{{ $gameWord['noun'] }}'>
                <input type='hidden' name='id' value='{{ $gameWord['id'] }}'>
                    <div class='row align-items-center'>
                        <div class='col'>
                            <input type='radio' id='{{ $gameWord['noun'] }}-der-guess' name='guess' value='der'>
                            <label for='{{ $gameWord['noun'] }}-der-guess'><img src='/images/buttons/house-blue.svg'>der</label>
                        </div>
                        <div class='col'>
                            <input type='radio' id='{{ $noun['noun'] }}-die-guess' name='guess'  value='die'>
                            <label for='{{ $gameWord['noun'] }}-die-guess'><img src='/images/buttons/house-red.svg'>die</label>
                        </div>
                        <div class='col'>
                            <input type='radio' id='{{ $gameWord['noun'] }}-das-guess' name='guess'  value='das'>
                            <label for='{{ $gameWord['noun'] }}-das-guess'><img src='/images/buttons/house-green.svg'>das</label>
                        </div>
                        <div class='col'>
                            {{ $gameWord['noun'] }}
                        </div>
                       
                    </div>
                </div>
                    <button class='btn btn-primary' type='submit'>See how I did!</button>
                <div>

                </div>
            </form>
        </div>
    </div>


@endsection
