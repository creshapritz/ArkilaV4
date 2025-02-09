<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function searchCars(Request $request)
{
    $validated = $request->validate([
        'destination' => 'nullable|string|max:255',
        'start_date' => 'nullable|date|after_or_equal:today',
        'end_date' => 'nullable|date|after:start_date',
        'type' => 'nullable|string|in:Sedan,Hatchback,SUV',
        'capacity' => 'nullable|integer|min:1',
        'transmission' => 'nullable|string|in:Automatic,Manual',
        'location' => 'nullable|string|in:Angono,Taytay,Antipolo,Binangonan',
        'price_min' => 'nullable|numeric|min:0',
        'price_max' => 'nullable|numeric|min:0|gte:price_min',
    ]);

    $cars = Car::query();

    // Apply filters
    if ($request->filled('destination')) {
        $cars->where('location', 'LIKE', '%' . $validated['destination'] . '%');
    }

    if ($request->filled('start_date') && $request->filled('end_date')) {
        $cars->whereDoesntHave('bookings', function ($query) use ($validated) {
            $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']]);
        });
    }

    if ($request->filled('type')) {
        $cars->where('type', $request->type);
    }

    if ($request->filled('capacity')) {
        $cars->where('seating_capacity', $request->capacity);
    }

    if ($request->filled('transmission')) {
        $cars->where('transmission', $request->transmission);
    }

    if ($request->filled('location')) {
        $cars->where('location', 'LIKE', '%' . $request->location . '%');
    }

    if ($request->filled('price_min')) {
        $cars->where('price_per_day', '>=', $request->price_min);
    }

    if ($request->filled('price_max')) {
        $cars->where('price_per_day', '<=', $request->price_max);
    }

    $cars = $cars->get();

    return view('car_results', compact('cars'));
}




    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    




    
}
