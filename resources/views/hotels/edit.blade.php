<!-- resources/views/hotels/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Hotel</h1>

    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="main_image" class="form-label">Main Image</label>
            <input type="text" class="form-control" id="main_image" name="main_image" value="{{ $hotel->main_image }}" required>
        </div>
        <!-- Add other fields as needed -->
        <button type="submit" class="btn btn-primary">Update Hotel</button>
    </form>
@endsection
