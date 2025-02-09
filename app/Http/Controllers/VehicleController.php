<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car; // Use the Car model
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    // Display the form for adding a new car
    public function add()
    {
        return view('admin.add-vehicle');
    }

    // Store a newly created car in the database


    public function store(Request $request)
    {
        // Validate the input fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'brand' => 'required|string',
            'type' => 'required|string',
            'location' => 'required|string',
            'price_per_day' => 'required|numeric',
            'seating_capacity' => 'required|integer',
            'gas_type' => 'required|string',
            'transmission' => 'required|string',
            'num_bags' => 'required|integer|min:0',
            'platenum' => 'nullable|string',
            'mileage' => 'nullable|integer',
            'color' => 'nullable|string',
            'availability' => 'nullable|date_format:Y-m-d',
            'regexpiry' => 'nullable|date',
            'primary_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'additional_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create a new Car instance
        $car = new Car();
        $car->name = $request->name;
        $car->brand = $request->brand;
        $car->type = $request->type;
        $car->location = $request->location;
        $car->price_per_day = $request->price_per_day;
        $car->seating_capacity = $request->seating_capacity;
        $car->gas_type = $request->gas_type;
        $car->transmission = $request->transmission;
        $car->num_bags = $request->num_bags;
        $car->platenum = $request->platenum;
        $car->mileage = $request->mileage;
        $car->color = $request->color;
        $car->regexpiry = $request->regexpiry;
        
        // Handle primary image upload
        if ($request->hasFile('primary_image')) {
            $imagePath = $request->file('primary_image')->store('car_images', 'public');
            $car->primary_image = $imagePath; // Save image path in DB
        }

        if ($request->hasFile('company_logo')) {
            $logoPath = $request->file('company_logo')->store('car_images', 'public');
            $car->company_logo = $logoPath;
        }
        if (!empty($additionalImagePaths)) {
            $car->additional_image = json_encode($additionalImagePaths);
        }
        

        // Save the car data
        $car->save();


        // Handle additional images
        $additionalImagePaths = [];
        if ($request->hasFile('additional_image')) {
            foreach ($request->file('additional_image') as $image) {
                $path = $image->store('car_images', 'public');
                $additionalImagePaths[] = $path;
            }
        }
        if (!empty($additionalImagePaths)) {
            $car->additional_image = json_encode($additionalImagePaths);
            $car->save(); // Save again after adding additional images
        }
        return redirect()->route('vehicles.list')->with('success', 'Car added successfully!');
    }




    public function list()
    {

        $cars = Car::all();


        if ($cars->isEmpty()) {
            return "No vehicles found in the database.";
        }

        return view('admin.list-vehicle', compact('cars'));
    }


    public function show($id)
    {
        // Fetch car details by ID
        $car = Car::findOrFail($id);
        return view('admin.car-details', compact('car')); // Pass single car to the view
    }



    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        // Delete car images if stored
        if ($car->primary_image) {
            Storage::delete('public/car_images/' . $car->primary_image);
        }

        // Delete additional images if any
        if ($car->additional_image) {
            foreach (json_decode($car->additional_image) as $image) {
                Storage::delete('public/car_images/' . $image);
            }
        }

        // Delete the car from the database
        $car->delete();

        return response()->json(['success' => 'Vehicle deleted successfully']);
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id); // Find the car by ID
        return view('admin.edit-vehicle', compact('car')); // Load edit page
    }

    public function index()
    {
        $cars = Car::all();
        $admin = Auth::guard('admin')->user(); // Get the authenticated admin
        return view('admin.admindashboard', compact('cars', 'admin'));
    }

    public function filterCars(Request $request)
    {
        // Start the query to get cars
        $query = Car::query();
    
        // Apply filters if any are provided
        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }
    
        if ($request->filled('brand')) {
            $query->where('brand', $request->input('brand'));
        }
    
        if ($request->filled('color')) {
            $query->where('color', $request->input('color'));
        }
    
        if ($request->filled('availability')) {
            $availability = $request->input('availability');
            if ($this->isValidDate($availability)) {
                $query->whereDate('availability', '>=', $availability);
            }
        }
    
        
        // Get the filtered cars
        $cars = $query->get();
        
    
        // Pass only filtered cars to the view
        return view('admin.admindashboard', compact('cars'));
    }
    


    /**
     * Helper function to check if a given string is a valid date
     */
    private function isValidDate($date)
    {
        return (bool) strtotime($date); // Checks if the date string can be converted to a valid timestamp
    }




}

