<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Tecnologia'],
            ['name' => 'Esportes'],
            ['name' => 'Política'],
            ['name' => 'Entretenimento'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
