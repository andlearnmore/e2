@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('content')
    <div class='d-flex flex-wrap justify-content-center py-3 mb-4'>
        @if($app->errorsExist())
            <ul class='error alert alert-danger'>
                @foreach($app->errors() as $error)
                <li><span test='validation-output'>{{ $error }}</span></li>
                @endforeach
            </ul>
        @endif
    </div>
    <div class='d-flex flex-wrap justify-content-center py-3 mb-4'>
        <div class='alert alert-light' role='alert'>
            <h1>The Blue Cake Game: der-die-das</h1>
            <div {{ ($newGame == false) ? 'hidden' : '' }}>
                <p>{{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing German.</p>
                <p>In German, there are three different definite articles (or basic ways to say 'the') for nouns: masculine ('der'), feminine ('die'), and neuter ('das'). In school, children learn these by writing the nouns<span>&mdash;</span>or putting pictures of them<span>&mdash;</span>in little colorful houses (blue=der, red=die, green=das). The article for 'Kuchen' is 'der' so it would go in the blue house. This is how the game gets its name!</p>
                <h3>How to Play</h3>
                <p>You'll be given a series of German nouns. Select the correct article for the noun by clicking on the appropriate article-house.</p>
            </div>
        </div>
    </div>
    <div>
    @if($newRound == true)
        <div class='flex-wrap justify-content-center py-3 mb-4'>
            <form test='game-form' method='POST' action='/score-play'>
                <div class='alert alert-info' role='alert'>
                    <div class='col'>
                        <div class='row align-items-center'>
                            <h3>{{ $gameWord['noun'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class='alert alert-info' role='alert'>
                    <input type='hidden' name='article' value='{{ $gameWord['article'] }}'>
                    <input type='hidden' name='gameNumber' value='{{ $gameNumber }}'>
                    <input type='hidden' name='id' value='{{ $gameWord['id'] }}'>
                    <input type='hidden' name='noun' value='{{ $gameWord['noun'] }}'>
                    <input type='hidden' name='round' value='{{ $round }}'>
                    <div class='row'>
                        <div class='col'>
                            <input test='der-radio' type='radio' id='{{ $gameWord['noun'] }}-der-guess' name='guess' value='der'>
                            <label for='{{ $gameWord['noun'] }}-der-guess'><img src='/images/buttons/house-blue.svg'>der</label>
                        </div>
                        <div class='col'>
                            <input test='die-radio' type='radio' id='{{ $gameWord['noun'] }}-die-guess' name='guess'  value='die'>
                            <label for='{{ $gameWord['noun'] }}-die-guess'><img src='/images/buttons/house-red.svg'>die</label>
                        </div>
                        <div class='col'>
                            <input test='das-radio' type='radio' id='{{ $gameWord['noun'] }}-das-guess' name='guess'  value='das'>
                            <label for='{{ $gameWord['noun'] }}-das-guess'><img src='/images/buttons/house-green.svg'>das</label>
                        </div>
                    </div>
                </div>
                <div class='alert alert-light' role='alert'>
                    <div class='col'>
                        <div class='row'>
                            <button test='guess-button' class='btn btn-primary' type='submit'>See how I did!</button>
                        </div>
                    </div>
                </div>
            </form>
        
        </div>
    @else
        <div test='feedback-div' class='container-sm feedback'>
        <span hidden test='article-output'>{{ $article }}</span>
            @if($correct == 1)
                <div class='alert alert-success' role='alert'>
                    <div class='col'>
                        <div class='row align-items-end'>
                            <div test='correct-output'><h4>Correct!</h4></div>
                            <h3>{{ $article . ' '. $noun}}</h3>
                        </div>
                    </div>
                </div>
            @else
                <div class='alert alert-danger' role='alert'>
                    <div class='col'>
                        <div class='row align-items-end'>
                            <div test='incorrect-output'> <h4>Incorrect. You selected '{{ $guess }} {{ $noun }}'. The answer is:</h4></div>
                            <h3> {{ $article . ' '. $noun}}</h3>
                        </div>
                    </div>
                </div>
            @endif

            <form method='POST' action='/next-word'>
                <input type='hidden' name='correct' value=null>
                <input type='hidden' name='gameNumber' value='{{ $gameNumber }}'>
                <input type='hidden' name='newRound' value='true'>
                <input type='hidden' name='round' value='{{ $round }}'>
                <div class='alert alert-light' role='alert'>
                    <div class='col'>
                        <div class='row align-items-end'>
                            <button test='next-button' class='btn btn-primary' name='nextWord' type='submit' value='true'>Next word</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
    
@endsection
