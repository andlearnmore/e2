@extends('templates/master')

@section('title')
    Game History
@endsection

@section('content')

    <div class='d-flex flex-wrap justify-content-center py-3 mb-2'>
        <h2>Game History</h2>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Game</th>
                        <th scope='col'>Timestamp</th>
                        <th scope='col'>Results</th>
                    </tr>
                </thead> 
                <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td><a test='game-results-link' href='/results?id={{ $game['gameNumber'] }}'>Game {{ $game['gameNumber'] }}</span></td>
                        <td>{{ $game['timestamp'] }}</td>
                        <td>{{ $game['correctGuesses'] }} / {{ $game['total'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    <div class='d-flex flex-wrap justify-content-center py-3 mb-4'>
        <ul>
            @foreach ($games as $game)
            @endforeach
        </ul>
    </div>

@endsection
