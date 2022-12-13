@extends('templates/master')

@section('title')
    Game History
@endsection

@section('content')

    <div class='d-flex flex-wrap justify-content-center py-3 mb-2'>
        <h1>Game History</h1>
    </div>
    <div class='d-flex flex-wrap justify-content-center py-3 mb-4'>
        <ul>
            @foreach ($games as $game)
                <li><span test='game-li'><a test='game-results-link' href='/results?id={{ $game['gameNumber'] }}'>Game {{ $game['gameNumber'] }} - {{ $game['timestamp'] }}</span></li>
            @endforeach
        </ul>
    </div>

@endsection

