<!-- resources/views/hotels/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Hotel Details</h1>

    <p>ID: {{ $hotel->id }}</p>
    <p>Main Image: {{ $hotel->main_image }}</p>
    <!-- Display other hotel details -->

    <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection
