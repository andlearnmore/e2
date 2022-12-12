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
            <div class='alert alert-light' role='alert'>
                <h1>Der-Die-Das Game</h1>
                <p>{{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing your German vocabulary.</p>
                <h3>How to Play</h3>
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

    @if($gameOver == true) 
        <div class='container-sm'>
            <div class='row align-items-center'>
                <div class='col align-self-center'>
                    <h2> Game Over! </h2>
                    <div class='col'>
                        <div class='row align-items-end'>
                            <a href='/games'>
                            <button class='btn btn-primary' type='submit'>All Games</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        @if($newRound == true)
        <div class='container-sm'>
            <div class='row'>
                <div class='col'>
                    <form method='POST' action='/score-play'>
                        <div class='alert alert-info' role='alert'>
                        <div class='col'>
                            <input type='hidden' name='article' value='{{ $gameWord['article'] }}'>
                            <input type='hidden' name='gameNumber' value='{{ $gameNumber }}'>
                            <input type='hidden' name='id' value='{{ $gameWord['id'] }}'>
                            <input type='hidden' name='noun' value='{{ $gameWord['noun'] }}'>
                            <input type='hidden' name='round' value='{{ $round }}'>

                            <div class='row align-items-center'>
                                <div class='col'>
                                    <input type='radio' id='{{ $gameWord['noun'] }}-der-guess' name='guess' value='der' checked>
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
                                    <div class='row align-items-center'>
                                        {{ $gameWord['noun'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class='alert alert-light' role='alert'>
                            <div class='col'>
                                <div class='row align-items-end'>
                                    <button class='btn btn-primary' type='submit'>See how I did!</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
            <div class='container-sm'>
                @if($correct == 1)
                    <div class='alert alert-success' role='alert'>
                        <div class='col'>
                            <div class='row align-items-end'>
                                <h4>Correct!</h4>
                                <h3>{{ $article . ' '. $noun}}</h3>
                            </div>
                        </div>
                    </div>
                @else
                    <div class='alert alert-danger' role='alert'>
                        <div class='col'>
                            <div class='row align-items-end'>
                                <h4>Incorrect. The answer is:</h4>
                                <h3> {{ $article . ' '. $noun}}</h3>
                            </div>
                        </div>
                    </div>

                @endif

                {{-- @if($article == 'der')
                    <div class='alert alert-primary' role='alert'>
                        <div class='col'>
                            <div class='row align-items-end'>
                                {{ $article . ' '. $noun}}
                            </div>
                        </div>
                    </div>
                @elseif($article == 'die')
                    <div class='alert alert-danger' role='alert'>
                        <div class='col'>
                            <div class='row align-items-end'>
                                {{ $article . ' '. $noun}}
                            </div>
                        </div>
                    </div>
                @else
                    <div class='alert alert-success' role='alert'>
                        <div class='col'>
                            <div class='row align-items-end'>
                                {{ $article . ' '. $noun}}
                            </div>
                        </div>
                    </div>
                @endif --}}

                <form method='POST' action='/next-word'>
                    {{-- <input type='hidden' name='article' value='{{ $article }}'> --}}
                    <input type='hidden' name='correct' value=null>
                    {{-- <input type='hidden' name='noun' value='{{ $noun }}'> --}}
                    <input type='hidden' name='gameNumber' value='{{ $gameNumber }}'>
                    <input type='hidden' name='newRound' value='true'>
                    <input type='hidden' name='round' value='{{ $round }}'>
                    <div class='alert alert-light' role='alert'>
                        <div class='col'>
                            <div class='row align-items-end'>
                                <button class='btn btn-primary' name='nextWord' type='submit' value='true'>Next word</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        @endif
    @endif

    

@endsection
