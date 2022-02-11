<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {        
        // Create data for Category
        $this->call(CategorySeeder::class);

        // Create data for Product
        $this->call(ProductSeeder::class);
    }
}
