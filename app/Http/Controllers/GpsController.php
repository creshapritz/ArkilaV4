<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GpsData;

class GpsController extends Controller
{
    // Store GPS data
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_id' => 'required|integer',
            'client_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $gpsData = new GpsData();
        $gpsData->car_id = $validatedData['car_id'];
        $gpsData->client_id = $validatedData['client_id'];
        $gpsData->latitude = $validatedData['latitude'];
        $gpsData->longitude = $validatedData['longitude'];
        $gpsData->save();

        return response()->json(['message' => 'GPS data stored successfully'], 201);
    }

    // Get latest GPS data for all cars
    public function index()
    {
        $gpsData = GpsData::select('car_id', 'client_id', 'latitude', 'longitude')
            ->orderBy('timestamp', 'desc')
            ->get()
            ->unique('car_id') // Get only the latest entry for each car
            ->values(); // Reset keys

        return response()->json($gpsData);
    }

    //Get latest GPS data for one car
    public function show($car_id)
    {
        $gpsData = GpsData::where('car_id', $car_id)
            ->orderBy('timestamp', 'desc')
            ->first();

        return response()->json($gpsData);
    }
    
}
