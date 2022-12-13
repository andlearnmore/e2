@extends('templates/master')

@section('title')
    All Nouns
@endsection

@section('content')
   <div class='container-fluid text-center'>
        <div class='container'>
            <div class='row'>
                <div class='col'>
                </div>
                <div class='col noun-name'>
                    <h1>All Nouns</h1>
                </div>
                <div class='col'>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                </div>
                <div class='col'>
                    @foreach ($nouns as $noun)
                    <div>
                        <div class='noun-name'>{{ $noun['article'] . ' ' . $noun['noun'] . ' = the ' . $noun['english']}}</div>
                    </div>
                    @endforeach
                </div>
                <div class='col'>
                </div>
            </div>
            <div class='row align-items-center'>
                <div class='noun-list'>

                </div>
            </div>
        </div>
    </div>

@endsection