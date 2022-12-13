@extends('templates/master')

@section('title')
    GameOver
@endsection

@section('content')
    <div class='d-flex flex-wrap justify-content-center py-3 mb-2'>
        <h1><span test='game-over'>Game Over!</span></h1>
    </div>
    <div class='d-flex flex-wrap justify-content-center py-3 mb-3'>
        <div>
            <a href='/games'>
                <button class='btn btn-primary' type='submit'>See results</button>
            </a>
        </div>
    </div>
    <div class='d-flex flex-wrap justify-content-center py-3 mb-3'>
        <div>
            <a href='/'>
                <button class='btn btn-primary' type='submit'>Play again</button>
            </a>
        </div>       
    </div>

@endsection