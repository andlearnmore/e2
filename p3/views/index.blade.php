@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('content')
   <div class="container-fluid">
        <h2>Welcome and willkommen!</h2>
        
        <div class="container text-center">

            <p>
                {{ $app->config('app.name') }} ("der blaue Kuchen" in German) is an app for practicing your German vocabulary.
            </p>
            
 
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    Column
                </div>
                <div class="col">
                    Column
                </div>
                <div class="col">
                    Column
                </div>
            </div>
        </div>
    </div>

@endsection
