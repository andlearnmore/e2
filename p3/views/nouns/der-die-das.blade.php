@extends('templates/master')

@section('title')
    Der-Die-Das
@endsection

@section('content')
   {{-- <div class="container-fluid"> --}}
        <h1>Der-Die-Das</h1>
        
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
        @foreach ($quizWords as $quizWord)
            {{-- <a class='noun-link' href='/noun?noun={{ $noun['noun'] }}'> --}}

                    <tbody>
                        <tr>
                        <th scope='row'></th>
                        <th scope='row'></th>
                        <th scope='row'></th>
                        <th scope='row'></th>
                        <td>{{ $quizWord['noun'] }}</td>
                        <th scope='row'></th>

                    </tbody>
                            @endforeach

                </table>
            </div>
            {{-- </a> --}}
    {{-- </div> --}}

@endsection