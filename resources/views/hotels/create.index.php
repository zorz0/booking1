<!-- resources/views/hotels/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Hotel</h1>

    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="main_image" class="form-label">Main Image</label>
            <input type="text" class="form-control" id="main_image" name="main_image" required>
        </div>
        <!-- Add other fields as needed -->
        <button type="submit" class="btn btn-primary">Create Hotel</button>
    </form>
@endsection
