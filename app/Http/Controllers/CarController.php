<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $car = new Car;

        $car->make = $request->make;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->daily_rate = $request->daily_rate;
        $car->thumbnail = $request->thumbnail;
        $car->description = $request->description;
        $car->available = $request->available;
        $car->created_by = auth()->user()->id;

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car created successfully!');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $car->make = $request->make;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->daily_rate = $request->daily_rate;
        $car->thumbnail = $request->thumbnail;
        $car->description = $request->description;
        $car->available = $request->available;

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }
}
