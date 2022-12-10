@extends('templates/master')

@section('title')
    Play Der-Die-Das
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
                @foreach ($gameWords as $gameWord)
                    <div class='row align-items-center'>
                        <input type='hidden' name='{{ $gameWord['noun'] }}-id' value='{{ $gameWord['id'] }}'>
                        <input type='hidden' name='{{ $gameWord['noun'] }}-article' value='{{ $gameWord['article'] }}'>
                        <div class='col'>
                            <input type='radio' id='{{ $gameWord['noun'] }}-der-guess' name='{{ $gameWord['noun'] }}-guess' value='der'>
                            <label for='{{ $gameWord['noun'] }}-der-guess'><img src='/images/buttons/house-blue.svg'>der</label>
                        </div>
                        <div class='col'>
                            <input type='radio' id='{{ $gameWord['noun'] }}-die-guess' name='{{ $gameWord['noun'] }}-guess'  value='die'>
                            <label for='{{ $gameWord['noun'] }}-die-guess'><img src='/images/buttons/house-red.svg'>die</label>
                        </div>
                        <div class='col'>
                            <input type='radio' id='{{ $gameWord['noun'] }}-das-guess' name='{{ $gameWord['noun'] }}-guess'  value='das'>
                            <label for='{{ $gameWord['noun'] }}-das-guess'><img src='/images/buttons/house-green.svg'>das</label>
                        </div>
                        <div class='col'>
                            {{ $gameWord['noun'] }}
                        </div>
                        
                    </div>
                @endforeach
                </div>
                    <button class='btn btn-primary' type='submit'>See how I did!</button>
                <div>

                </div>
            </form>
        </div>
    </div>

@endsection