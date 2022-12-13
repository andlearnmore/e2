@extends('templates/master')

@section('title')
    GameOver
@endsection

@section('content')
   <div class='container-fluid text-center'>
        <div class='container'>
            <div class='row'>
                <div class='col'>
                </div>
                <div class='col'>
                    <h1>Game Over!</h1>
                </div>
                <div class='col'>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                </div>
                <div class='col'>
                    <a href='/games'>
                        <button class='btn btn-info' type='submit'>See results</button>
                    </a>
                </div>
                <div class='col'>
                </div>
            </div>
            <div class='row'>
            </div>
            <div class='row'>
                <div class='col'>
                </div>
                <div class='col'>
                    <div class='space'>
                    <a href='/'>
                        <button class='btn btn-primary' type='submit'>Play again</button>
                    </a>
                    </div>
                </div>
                <div class='col'>
                </div>
            </div>
        </div>
    </div>

@endsection