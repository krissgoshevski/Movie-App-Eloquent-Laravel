@extends('layouts.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Include CSS file -->
<link rel="stylesheet" href="{{ asset('css/menu.css') }}"> <!-- Include CSS file -->

@endpush

@section('title', 'Create Movie')

@section('content')
<h2>Create New Movie:</h2>
    <form method="POST" action="{{ route('movie.store') }}" enctype="multipart/form-data" class="form">
        @csrf

        <!-- Movie Title -->
    <p>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
    </p>

       <!-- Start Date -->
    <p>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
    </p>

        <!-- End Date -->
    <p>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
    </p>

        <!-- Length -->
    <p>
        <div class="form-group">
            <label for="length">Length (minutes)</label>
            <input type="number" class="form-control" id="length" name="length" required>
        </div>
    </p>

        <!-- Year -->
    <p>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>
    </p>

         <!-- Description -->
    <p>
         <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>
    </p>

         <!-- Poster Image URL -->
    <p>
         <div class="form-group">
            <label for="img1">Image url:</label>
            <input type="url" class="form-control" id="img1" name="images[]" required>
        </div>
    </p>


   <p>
    <div class="form-group">
    <label for="image">Choose Image: </label>
    <input type="file" class="form-control-file" id="image" name="images[]" accept="image/*">
    </div>
  </p>

         <!-- Actors (checkboxes) -->
    <p>
         <div class="form-group">
            <label>Actors</label><br>
            @foreach($actors as $actor)
                <input type="checkbox" name="actors[]" value="{{ $actor->id }}"> {{ $actor->name }}<br>
            @endforeach
        </div>
    </p>


             <!-- Genres (checkboxes) -->
    <p>
        <div class="form-group">
            <label>Genres</label><br>
            @foreach($genres as $genre)
                <input type="checkbox" name="genres[]" value="{{ $genre->id }}"> {{ $genre->name }}<br>
            @endforeach
        </div>
    </p>


          <!-- Directors (checkboxes) -->
    <p>
          <div class="form-group">
            <label>Directors</label><br>
            @foreach($directors as $director)
                <input type="checkbox" name="directors[]" value="{{ $director->id }}"> {{ $director->name }} {{ $director->surname }}<br>
            @endforeach
        </div>
    </p>

       
        <!-- Rating (Dropdown) -->
    <p>
        <div class="form-group">
            <label for="rating_id">Rating</label>
            <select class="form-control" id="rating_id" name="rating_id" required>
                <option value="">Select a rating</option>
                @foreach($ratings as $rating)
                    <option value="{{ $rating->id }}">{{ $rating->name }}</option>
                @endforeach
            </select>
        </div>
    </p>

        <!-- Type (Dropdown) -->
    <p>
        <div class="form-group">
            <label for="type_id">Type</label>
            <select class="form-control" id="type_id" name="type_id" required>
                <option value="">Select a type</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
    </p>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>

</div>
@endsection