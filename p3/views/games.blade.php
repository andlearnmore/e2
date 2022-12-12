@extends('templates/master')

@section('title')
    Games
@endsection

@section('content')
   <div class='container-fluid text-center'>
        <h1>Games</h1>
        
        <div>
            <ul>
                @foreach ($games as $game)
                    <li><a href='/results?id={{ $game['gameNumber'] }}'>{{ $game['timestamp'] }}</li>
                @endforeach
            </ul>
         </div>

    </div>

@endsection

