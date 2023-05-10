<!-- resources/views/cars/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Car</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" id="make" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="daily_rate">Daily Rate</label>
            <input type="number" name="daily_rate" id="daily_rate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="text" name="thumbnail" id="thumbnail" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="available">Available</label>
            <input type="checkbox" name="available" id="available" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
