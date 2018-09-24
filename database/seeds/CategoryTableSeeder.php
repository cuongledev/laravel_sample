<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Uncategory',
            'slug' => 'uncategory',
            'order' => 0,
            'parent' => 0,
        ]);
        factory(Category::class, 50)->create();
    }
}
