<!-- resources/views/cars/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Car</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('cars.update', $car) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" id="make" class="form-control" value="{{ $car->make }}" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ $car->model }}" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $car->year }}" required>
        </div>
        <div class="form-group">
            <label for="daily_rate">Daily Rate</label>
            <input type="number" name="daily_rate" id="daily_rate" class="form-control" value="{{ $car->daily_rate }}" required>
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="text" name="thumbnail" id="thumbnail" class="form-control" value="{{ $car->thumbnail }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $car->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="available">Available</label>
            <input type="checkbox" name="available" id="available" class="form-control" {{ $car->available ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
