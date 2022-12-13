@extends('templates/master')

@section('title')
    Results
@endsection

@section('content')
   <div class='container-fluid text-center'>
        <h1>Results</h1>
        
        <div>
        <h2>Game Number: {{ $gameNumber }}</h2>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope="col">Word</th>
                        <th scope="col">Results</th>
                    </tr>
                </thead> 
                <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result['article'] . " " . $result['noun'] }}</td>
                        <td>{{ ($result['correct']) ? 'correct' : 'incorrect' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div> 
        <a href='/games'>
            <button class='btn btn-primary' type='submit'>Game History</button>
        </a>
        </div>

    </div>

@endsection

