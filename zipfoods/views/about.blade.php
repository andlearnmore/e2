
@extends('templates/master')

@section('title')
    {{ $app->config('app.name') }}
@endsection

@section('content')

<h2>About</h2>

{{ $storeName }} is your one-stop-shop for convenient online grocery shopping in the {{ $city }} Area.

@endsection