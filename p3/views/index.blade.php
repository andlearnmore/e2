@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('body')
<div class='container-sm'>
    <div class='row'>
        <div class='col-sm'>
                @if($app->errorsExist())
                <ul class='error alert alert-danger'>
                    @foreach($app->errors() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
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
    @if($newRound == true)
    <div class='container-sm'>

        <div class='row'>
            <div class='col'>
                <form method='POST' action='/score-play'>
                    <div> 
                        <input type='hidden' name='article' value='{{ $gameWord['article'] }}'>
                        <input type='hidden' name='gameNumber' value='{{ $gameNumber }}'>
                        <input type='hidden' name='id' value='{{ $gameWord['id'] }}'>
                        <input type='hidden' name='noun' value='{{ $gameWord['noun'] }}'>
                        <input type='hidden' name='round' value='{{ $round }}'>

                        <div class='row align-items-center'>
                            <div class='col'>
                                <input type='radio' id='{{ $gameWord['noun'] }}-der-guess' name='guess' value='der'>
                                <label for='{{ $gameWord['noun'] }}-der-guess'><img src='/images/buttons/house-blue.svg'>der</label>
                            </div>
                            <div class='col'>
                                <input type='radio' id='{{ $gameWord['noun'] }}-die-guess' name='guess'  value='die'>
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
    </div>
    @else
        @if($correct == 1)
            <div class='alert alert-light' role='alert'>
                <h3>Correct!</h3>
        @else
            <div class='alert alert-dark' role='alert'>
                <h3>That's not it. The answer is:</h3>
        @endif

        @if($article == 'der')
            <div class='alert alert-primary' role='alert'>
                <div>{{ $article . ' '. $noun}}</div>
            </div>
        @elseif($article == 'die')
            <div class='alert alert-danger' role='alert'>
                <div>{{ $article . ' '. $noun}}</div>
            </div>
        @else
            <div class='alert alert-success' role='alert'>
                <div>{{ $article . ' '. $noun}}</div>
            </div>
        @endif

        <form method='POST' action='/next-word'>
            {{-- <input type='hidden' name='article' value='{{ $article }}'> --}}
            <input type='hidden' name='correct' value=null>
            {{-- <input type='hidden' name='noun' value='{{ $noun }}'> --}}
            <input type='hidden' name='gameNumber' value='{{ $gameNumber }}'>
            <input type='hidden' name='newRound' value='true'>
            <input type='hidden' name='round' value='{{ $round }}'>

            <button class='btn btn-primary' name='nextWord' type='submit' value='true'>Next word</button>
        </form>
    @endif


@endsection
