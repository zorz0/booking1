<!-- resources/views/hotels/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Hotels</h1>

    <a href="{{ route('hotels.create') }}" class="btn btn-primary">Create Hotel</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Short Description</th>
                <th>Price</th>
                <th>Available Rooms</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->short_description }}</td>
                    <td>${{ $hotel->price }}</td>
                    <td>{{ $hotel->available_rooms }}</td>
                    <td>
                        <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('hotels.edit', $hotel->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('hotels.destroy', $hotel->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
