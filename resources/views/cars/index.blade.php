<!-- resources/views/cars/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Cars</h1>
    
    <a href="{{ route('cars.create') }}" class="btn btn-primary">Add Car</a>
    
    @if ($cars->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Daily Rate</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->make }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->daily_rate }}</td>
                        <td>
                            <a href="{{ route('cars.edit', $car) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('cars.destroy', $car) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No cars found.</p>
    @endif
@endsection
