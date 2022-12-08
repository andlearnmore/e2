@extends('templates/master')

@section('title')
    Der-Die-Das
@endsection

@section('content')
    <div class='row'>
        <div class='col'>
            <h1>Der-Die-Das</h1>
        </div>
    </div>

    <div class='row'>
        <div class='col'>
            <form method='POST' action='score-play'>
                <div> 
                @foreach ($gameWords as $gameWord)
                    <div class='row align-items-center'>
                        <div class='col'>
                            <input type='radio' id='{{ $gameWord['noun'] }}-der-guess' name='houses' value='der'>
                            <label for='{{ $gameWord['noun'] }}-der-guess'><img src='/images/buttons/house-blue.svg'>der</label>
                        </div>
                        <div class='col'>
                            <input type='radio' id='{{ $gameWord['noun'] }}-die-guess' name='houses' value='die'>
                            <label for='{{ $gameWord['noun'] }}-die-guess'><img src='/images/buttons/house-red.svg'>die</label>
                        </div>
                        <div class='col'>
                            <input type='radio' id='{{ $gameWord['noun'] }}-das-guess' name='houses' value='das'>
                            <label for='{{ $gameWord['noun'] }}-das-guess'><img src='/images/buttons/house-green.svg'>das</label>
                        </div>
                        <div class='col'>
                            {{ $gameWord['noun'] }}
                        </div>
                    </div>
                @endforeach
                </div>
                    <button type='submit'>See how I did!</button>
                <div>

                </div>
            </form>
        </div>
    </div>
        {{-- # One way: table
            <div class='container-fluid'>
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>Der</th>
                            <th scope='col'>Die</th>
                            <th scope='col'>Das</th>
                            <th scope='col'>Article</th>
                            <th scope='col'>Noun</th>
                            <th scope='col'>Result</th>
                        </tr>
                    </thead>
   <a class='noun-link' href='/noun?noun={{ $noun['noun'] }}'>

                    {{-- <tbody>
                        <tr>
                        <th scope='row'></th>
                        <th scope='row'></th>
                        <th scope='row'></th>
                        <th scope='row'></th>
                        <td>{{ $gameWord['noun'] }}</td>
                        <th scope='row'></th>

                    </tbody>
                            @endforeach

                </table>
            </div> --}} 
            {{-- </a> --}}
    {{-- </div> --}}

@endsection