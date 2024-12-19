<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(2)->create();

        Category::create([
            'category_title' => 'Timeline Management',
            'slug' => 'Timeline-Management',
            'color' => 'green'
        ]);

        Category::create([
            'category_title' => 'Investigation and Analysis',
            'slug' => 'Investigation-Analysis',
            'color' => 'blue'
        ]);

        Category::create([
            'category_title' => 'Enforcement and Security',
            'slug' => 'Enforcement-Security',
            'color' => 'red'
        ]);
    }
}
