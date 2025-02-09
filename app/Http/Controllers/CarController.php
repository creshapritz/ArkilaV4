<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function searchCars(Request $request)
    {
        $validated = $request->validate([
            'destination' => 'required|string|max:255',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'seating_capacity' => 'nullable|integer|min:1',
            'transmission' => 'nullable|string|in:Automatic,Manual',
            'gas_type' => 'nullable|string|in:Gasoline,Diesel',
            'price_min' => 'nullable|numeric|min:0',
            'price_max' => 'nullable|numeric|min:0|gte:price_min',
        ], [
            'destination.required' => 'Destination is required.',
            'start_date.required' => 'Start date is required.',
            'end_date.required' => 'End date is required.',
            'start_date.after_or_equal' => 'Start date must be today or in the future.',
            'end_date.after' => 'End date must be after the start date.',
        ]);

        $cars = Car::query()
            ->where('location', 'LIKE', '%' . $validated['destination'] . '%')
            ->whereDoesntHave('bookings', function ($query) use ($validated) {
                $query->where(function ($q) use ($validated) {
                    $q->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                        ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']]);
                });
            });

        // Apply additional filters based on the form input
        if ($request->has('type') && $request->type) {
            $cars->where('type', $request->type);
        }
        
        if ($request->has('capacity') && $request->capacity) {
            $cars->where('seating_capacity', $request->capacity); // Ensure the DB column is correct
        }
        
        if ($request->has('transmission') && $request->transmission) {
            $cars->where('transmission', $request->transmission);
        }
        
        if ($request->has('location') && $request->location) {
            $cars->where('location', 'LIKE', '%' . $request->location . '%');
        }
        
        if ($request->has('price_min') && $request->price_min) {
            $cars->where('price_per_day', '>=', $request->price_min);
        }
        
        if ($request->has('price_max') && $request->price_max) {
            $cars->where('price_per_day', '<=', $request->price_max);
        }
        // Get the filtered cars
        $cars = $cars->get();

        return view('car_results', compact('cars'));
    }







    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }
}
