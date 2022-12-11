@extends('templates/master')

@section('title')
    {{ $noun['noun'] }}
@endsection

@section('content')
    <div class='row'>
        <div class='col'>
            <h1>Der-Die-Das</h1>
        </div>
    </div>

    <div class='row'>
        <div class='col'>
            <form method='POST' action='/nouns/score-play'>
                <div> 
                <input type='hidden' name='game-number' value='{{ $gameNumber }}'>
                <input type='hidden' name='article' value='{{ $noun['article'] }}'>
                <input type='hidden' name='noun' value='{{ $noun['noun'] }}'>
                <input type='hidden' name='id' value='{{ $noun['id'] }}'>


                    <div class='row align-items-center'>
                        <div class='col'>
                            <input type='radio' id='{{ $noun['noun'] }}-der-guess' name='guess' value='der'>
                            <label for='{{ $noun['noun'] }}-der-guess'><img src='/images/buttons/house-blue.svg'>der</label>
                        </div>
                        <div class='col'>
                            <input type='radio' id='{{ $noun['noun'] }}-die-guess' name='guess'  value='die'>
                            <label for='{{ $noun['noun'] }}-die-guess'><img src='/images/buttons/house-red.svg'>die</label>
                        </div>
                        <div class='col'>
                            <input type='radio' id='{{ $noun['noun'] }}-das-guess' name='guess'  value='das'>
                            <label for='{{ $noun['noun'] }}-das-guess'><img src='/images/buttons/house-green.svg'>das</label>
                        </div>
                        <div class='col'>
                            {{ $noun['noun'] }}
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