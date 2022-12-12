@extends('templates/master')

@section('title')
    All Nouns
@endsection

@section('content')
   <div class='container-fluid text-center'>
        <h1>All Nouns</h1>
        
        @foreach ($nouns as $noun)
            <div>
                <div class='noun-name'>{{ $noun['article'] . ' ' . $noun['noun'] }}</div>
            </div>
        @endforeach
    </div>

@endsection