<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the tables in the correct order
        DB::table('order_items')->truncate();
        DB::table('products')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create products
        $products = [
            [
                'name' => 'Product 1',
                'slug' => 'product-1',
                'description' => 'Description for Product 1',
                'price' => 100.00,
                'sku' => 'PRD001',
                'barcode' => '123456789012',
                'quantity' => 50,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'name' => 'Product 2',
                'slug' => 'product-2',
                'description' => 'Description for Product 2',
                'price' => 200.00,
                'sku' => 'PRD002',
                'barcode' => '123456789013',
                'quantity' => 30,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'name' => 'Product 3',
                'slug' => 'product-3',
                'description' => 'Description for Product 3',
                'price' => 150.00,
                'sku' => 'PRD003',
                'barcode' => '123456789014',
                'quantity' => 20,
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
