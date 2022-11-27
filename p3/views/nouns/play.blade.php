@extends('templates/master')

@section('title')
    Play
@endsection

@section('content')
   {{-- <div class="container-fluid"> --}}
        <h1>Play</h1>
        

    {{-- </div> --}}

@endsection

@section('body')
        @foreach ($words as $word)
            {{-- <a class='noun-link' href='/noun?noun={{ $noun['noun'] }}'> --}}
                <div>
                    <div class='noun-name'>{{ $word['article'] . ' ' . $word['noun'] }}</div>
                </div>
            </a>
        @endforeach
@endsection

