<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
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

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
