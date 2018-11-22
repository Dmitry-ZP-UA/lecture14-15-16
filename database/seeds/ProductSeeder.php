<?php

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
        DB::table('products')->insert([
            [
                'name' => 'Product 1',
                'category_id' => 1,
                'slug' => 'product-1',
                'description' => 'Some product1 description',
                'price' => 100,
                'quantity' => 100,
                'status' => 1
            ],
            [
                'name' => 'Product 2',
                'category_id' => 2,
                'slug' => 'product-2',
                'description' => 'Some product2 description',
                'price' => 200,
                'quantity' => 200,
                'status' => 1
            ],

        ]);
    }
}
