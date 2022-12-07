@extends('templates/master')

@section('title')
    Play
@endsection

@section('content')
   {{-- <div class="container-fluid"> --}}
        <h1>Play</h1>
        
    {{-- CREATE TABLE, FILLING IN @FOREACH QUIZWORDS AS QUIZWORD  --}}
    {{-- WITH der die das houses as radio buttons on left side --}}
    {{-- </div> --}}

@endsection

@section('body')
        
            {{-- <a class='noun-link' href='/noun?noun={{ $noun['noun'] }}'> --}}
                <div>
                    <div class='noun-name'>{{ $word['article'] . ' ' . $word['noun'] }}</div>
                </div>


@endsection

