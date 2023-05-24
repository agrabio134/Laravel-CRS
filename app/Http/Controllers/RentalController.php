<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RentalController extends Controller
{
    /**
     * Store a newly created rental in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'car_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Create a new rental record
        $rental = new Rental();
        $rental->car_id = $request->car_id;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        $rental->customer_id = Auth::id(); // Set the current user's ID

        // Add any other fields you have in the rentals table

        // Save the rental record
        $rental->save();

        // Redirect or perform any other operations after successful rental creation
        return redirect()->back()->with('success', 'Rental created successfully.');
    }
}
