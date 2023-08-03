<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Box;
use App\Models\Shelf;
use App\Models\Store;
use App\Models\Tracking;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the boxes with the name and the  shelves


        // create the stores 
        $stores = Store::factory()->count(10)
                ->has(Tracking::factory()->count(random_int(1, 20)), "codes"); 

        Box::factory()
        ->count(10)
        ->has(Shelf::factory()->count(5)->has($stores))
        ->create();
    }
}
