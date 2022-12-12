@extends('templates/master')

@section('title')
    Results
@endsection

@section('content')
   <div class='container-fluid text-center'>
        <h1>Results</h1>
        
        <div>
            <ul>
                @foreach ($results as $result)
                    <li><a href='/round?id={{ $result['gameNumber'] }}'>{{ $result['timestamp'] . ' - '. $result['gameNumber']}}</li>
                @endforeach
            </ul>
         </div>

    </div>

@endsection

