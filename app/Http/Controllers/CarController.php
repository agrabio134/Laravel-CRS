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

    // app/Http/Controllers/CarController.php

    public function landing()
    {
        return view('pages.landing');
    }


    public function store(Request $request)
    {
        $car = new Car;

        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->daily_rate = $request->input('daily_rate');
        $car->thumbnail = $request->input('thumbnail');
        $car->description = $request->input('description');
        $car->available = $request->input('available');
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
        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->daily_rate = $request->input('daily_rate');
        $car->thumbnail = $request->input('thumbnail');
        $car->description = $request->input('description');
        $car->available = $request->input('available');

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
    }
}
