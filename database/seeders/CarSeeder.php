<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        // Update Toyota Corolla
        Car::where('name', 'Toyota Corolla')
            ->update([
                'brand' => 'Toyota',
                'type' => 'Sedan',
                'location' => 'Angono',
                'price_per_day' => 2300,
                'availability' => true,
                'image' => 'assets/img/car2.png',
                'seating_capacity' => 5,
                'num_bags' => 4,
                'gas_type' => 'Gasoline',
                'transmission' => 'Automatic',
            ]);

        // Update Honda Civic
        Car::where('name', 'Honda Civic')
            ->update([
                'brand' => 'Honda',
                'type' => 'Sedan',
                'location' => 'Manila',
                'price_per_day' => 2500,
                'availability' => true,
                'image' => 'assets/img/car2.png',
                'seating_capacity' => 5,
                'num_bags' => 4,
                'gas_type' => 'Diesel',
                'transmission' => 'Manual',
            ]);

        // Update Mitsubishi Mirage entries by location
        Car::where('name', 'Mitsubishi Mirage')->where('location', 'Rizal')
            ->update([
                'brand' => 'Mitsubishi',
                'type' => 'Hatchback',
                'price_per_day' => 2500,
                'availability' => true,
                'image' => 'assets/img/car3.png',
                'seating_capacity' => 4,
                'num_bags' => 2,
                'gas_type' => 'Gasoline',
                'transmission' => 'Automatic',
            ]);

        Car::where('name', 'Mitsubishi Mirage')->where('location', 'Antipolo')
            ->update([
                'brand' => 'Mitsubishi',
                'type' => 'Hatchback',
                'price_per_day' => 2300,
                'availability' => true,
                'image' => 'assets/img/car4.png',
                'seating_capacity' => 4,
                'num_bags' => 2,
                'gas_type' => 'Gasoline',
                'transmission' => 'Manual',
            ]);

        Car::where('name', 'Mitsubishi Mirage')->where('location', 'Binangonan')
            ->update([
                'brand' => 'Mitsubishi',
                'type' => 'Hatchback',
                'price_per_day' => 2500,
                'availability' => true,
                'image' => 'assets/img/car4.png',
                'seating_capacity' => 4,
                'num_bags' => 2,
                'gas_type' => 'Diesel',
                'transmission' => 'Automatic',
            ]);

        Car::where('name', 'Mitsubishi Mirage')->where('location', 'Taytay')
            ->update([
                'brand' => 'Mitsubishi',
                'type' => 'Hatchback',
                'price_per_day' => 2600,
                'availability' => true,
                'image' => 'assets/img/car2.png',
                'seating_capacity' => 4,
                'num_bags' => 2,
                'gas_type' => 'Gasoline',
                'transmission' => 'Manual',
            ]);

        // Create new Mitsubishi Mirage entries
        Car::create([
            'name' => 'Mitsubishi Mirage',
            'brand' => 'Mitsubishi',
            'type' => 'Hatchback',
            'location' => 'Antipolo',
            'price_per_day' => 2300,
            'availability' => true,
            'image' => 'assets/img/car2.png',
            'seating_capacity' => 4,
            'num_bags' => 2,
            'gas_type' => 'Gasoline',
            'transmission' => 'Automatic',
        ]);

        Car::create([
            'name' => 'Mitsubishi Mirage',
            'brand' => 'Mitsubishi',
            'type' => 'Hatchback',
            'location' => 'Binangonan',
            'price_per_day' => 2500,
            'availability' => true,
            'image' => 'assets/img/car3.png',
            'seating_capacity' => 4,
            'num_bags' => 2,
            'gas_type' => 'Diesel',
            'transmission' => 'Manual',
        ]);

        Car::create([
            'name' => 'Mitsubishi Mirage',
            'brand' => 'Mitsubishi',
            'type' => 'Hatchback',
            'location' => 'Taytay',
            'price_per_day' => 2600,
            'availability' => true,
            'image' => 'assets/img/car4.png',
            'seating_capacity' => 4,
            'num_bags' => 2,
            'gas_type' => 'Gasoline',
            'transmission' => 'Automatic',
        ]);
    }
}
