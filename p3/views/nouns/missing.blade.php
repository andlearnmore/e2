@extends('templates/master')

@section('title')
    Word Not Found
@endsection

@section('content')

    <h2>Word Not Found</h2>

        <p>
            Sorry, we were not able to find that word.
        </p>

        <p>
            <a href='/nouns'>Here is the list of words available in our game.</a>
        </p>
@endsection