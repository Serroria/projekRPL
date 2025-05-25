<?php
// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['nama' => 'minumanHerbal'],
            ['nama' => 'jamuAnak'],
            ['nama' => 'jamuHerbal'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

?>