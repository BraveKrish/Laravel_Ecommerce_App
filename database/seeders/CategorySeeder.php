<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['title' => 'Electronics'],
            ['title' => 'Books'],
            ['title' => 'Clothing'],
            ['title' => 'Sports']
        ];

        foreach($categories as $category){
            ProductCategory::create($category);
        }
    }
}
