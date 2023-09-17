@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/indexpage.css') }}"> 
<link rel="stylesheet" href="{{ asset('css/menu.css') }}"> <!-- Include CSS file -->

@endpush

@section('content')
    <h1>All Movies</h1>

    <!-- input search -->
<div class="row justify-content-center">
        <input type="text" id="search" name="search" placeholder="search a movie by title..."/>
</div> <hr>

    <table class="table table-striped" id="movies">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Length</th>
                <th>Year</th>
                <th>Description</th>
                <th>Rating</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>

                    <td>

                        <a href="{{ route('movie.show', ['id' => $movie->id]) }}" class="movie-link">
                            {{ $movie->title }}
                        </a>
                    </td>
                    <td>{{ $movie->start_date }}</td>
                    <td>{{ $movie->end_date }}</td>
                    <td>{{ $movie->length }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->rating->name }}</td>
                    <td>{{ $movie->type->name }}</td>
                </tr>
            @endforeach
           
        </tbody>
    </table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
$(document).ready(function() {
    var moviesTable = $('#movies tbody');

    $('#search').on('input', function() {
        var searchQuery = $(this).val();
        
        $.ajax({
            url: "{{ route('movie.search') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                search: searchQuery
            },
            success: function(response) {
                appendMovies(moviesTable, response);
            }
        });
    });
});

function appendMovies(table, movies) {
    table.html('');

    movies.forEach(movie => {
        table.append(
            `<tr data-user_id='${movie.id}'> 
                <td>${movie.id}</td>
                <td>${movie.title}</td>
                <td>${movie.start_date}</td>
                <td>${movie.end_date}</td>
                <td>${movie.length}</td>
                <td>${movie.year}</td>
                <td>${movie.description}</td>
             
            </tr>`
        );
    });
}
//    <td>${movie.rating.name}</td> ne funkcioniraat relaciite 
// <td>${movie.type.name}</td>

</script>

@endsection
