<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

<<<<<<< HEAD
        $this->call([
           
            CarSeeder::class,
            // Add other seeder classes as needed
        ]);





=======
>>>>>>> 913c2da (uploadingv1)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
<<<<<<< HEAD

    
=======
>>>>>>> 913c2da (uploadingv1)
}
