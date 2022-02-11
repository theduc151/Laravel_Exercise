<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::take(30)->get();

        if (!empty($categories)) {
            for ($i=1; $i <= 30 ; $i++) { 
                Category::create([
                    'name' => 'Category Name ' . $i,
                ]);
            }
        }
    }
}
