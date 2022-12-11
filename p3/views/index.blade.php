@extends('templates/master')

@section('title')
    {{ $welcome }}
@endsection

@section('body')

   <div class='container-fluid text-center'>
        <h1>{{ $welcome }}</h1>
        <p>{{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing your German vocabulary.</p>
    </div>

    @if ($newGame = false) 
    <div class="container-fluid">
        <div class='container text-center'>
            <form method='POST' action='/play'>
                <button type='submit' class='btn btn-primary' id='play' name='newGame' value='false'>Next</button>
            </form>
        </div>
    </div>
    @else
        <div class="container-fluid">
        <div class='container text-center'>
            <form method='POST' action='/nouns/start'>
                <button type='submit' class='btn btn-primary' id='play' name='newGame' value='true'>Play</button>
            </form>
        </div>
    </div>
    @endif


@endsection
