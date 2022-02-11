<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::take(30)->get();
        // $categories = Category::leftJoin('products', 'products.category_id', '=', 'categories.id')
        //     ->select('categories.*')
        //     ->get();


        include 'quantities.php';
        include 'categories.php';
        include 'prices.php';

        if (!empty($categories)) {
            if (!empty($products)) {
                for ($i=1; $i <= 20; $i++) { 
                    $productInsert = Product::create([
                            // 'category_id' => $categories->category_id,
                            'category_id' => $categories[array_rand($categories)],
                            'name' => 'Product Name ' .$i,
                            'thumbnail' => 'Thumbnail ' .$i,
                            'description' => 'Description ' .$i,
                            'quantity' => $quantities[array_rand($quantities)],
                            'price' => $prices[array_rand($prices)],
                    ]); 
                }
            }
        }
        
    }
}
