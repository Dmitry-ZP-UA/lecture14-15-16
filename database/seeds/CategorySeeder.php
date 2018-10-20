<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Category 1',
                'slug' => 'category_1',
                'description' => 'Some category description',
            ],
            [
                'name' => 'Category 2',
                'slug' => 'category_2',
                'description' => 'Another category description',
            ],
        ]);
    }
}
