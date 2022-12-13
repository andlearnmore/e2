@extends('templates/master')

@section('title')
    All Nouns
@endsection

@section('content')

    <div class='d-flex flex-wrap justify-content-center py-3 mb-2'>
        <h1>All Nouns</h1>
    </div>
    <div class='d-flex flex-wrap justify-content-center py-3 mb-3'>
        <ul>
        @foreach ($nouns as $noun)
                <li><span test='noun-li'>{{ $noun['article'] . ' ' . $noun['noun'] . ' = the ' . $noun['english']}}</span></li>
        @endforeach
        </ul>
    </div>

@endsection