@extends('templates/master')

@section('title')
    All Nouns
@endsection

@section('content')
   <div class="container-fluid">
        <h2>All Nouns</h2>
        
        <div id='noun-index'>
            @foreach ($nouns as $noun)
                <a class='noun-link' href='/noun?noun={{ $noun['noun'] }}'>
                    <div>
                        <div class='noun-name'>{{ $noun['noun'] }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

@endsection
