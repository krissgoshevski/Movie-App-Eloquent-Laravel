

@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Include CSS file -->
<link rel="stylesheet" href="{{ asset('css/menu.css') }}"> <!-- Include CSS file -->

@endpush

@section('title', 'Show')

@section('header')
<h2>Movie title:  {{ $movie->title }} </h2> <hr>
@endsection


@section('content')
<h3>All informations about this movie:</h3>
   
    <p>  <!-- Start Date -->   
            <label>Start Date: {{ $movie->start_date }}</label>
    </p>

    <p>  <!-- End Date -->
            <label>End Date: {{ $movie->end_date }}</label>
    </p>
   
    <p>    <!-- Length --> 
            <label>Length: {{ $movie->length }}</label>
    </p>
     
    <p>  <!-- Year -->  
            <label>Year: {{ $movie->year }}</label>
    </p>
    
    <p> <!-- Description -->  
            <label>Description: {{ $movie->description }}</label>
    </p>
   
    <p>  <!-- Img 1L -->    
            <label>Image url: {{ $movie->images }}</label>
    </p>
 

    <p>Image: </p>
    @foreach ($movie->images as $image)
    <img src="{{ asset($image->url) }}" alt="Image">
    @endforeach

    <img src="{{ asset('storage\app\images\3aKAhAezhjHCwmcRWPKsiFG5dKQtF8VUNWDOrcVI.jpg') }}" alt="Слика">

    <p>    <!-- Genres  -->
            @foreach($movie->genres as $genre)
            <label> Genres: {{ $genre->name }} </label>
            @endforeach
    </p>

         
    <p>Directors:</p>  <!-- Directors -->
    <ol>
            @foreach($movie->directors as $dir)
        <li>{{ $dir->name }} {{ $dir->surname }} </li>
            @endforeach
    </ol>


    <p>Actors:</p>
    <ol>
    @foreach ($movie->actors as $actor)
    <li>{{ $actor->name }} {{ $actor->surname }}</li>
    @endforeach
    </ol>


    <p> <!-- rating -->
            <label> Rating: {{ $movie->rating->name }} </label>
    </p>

    <p> <!-- Type -->
            <label> Type: {{ $movie->type->name }} </label>
    </p>

<!--  r a ti ng ni e imaeto na metodot vo Modelot Movie za da dojdeme do imeto na ratingot na filmot po id -->
@endsection