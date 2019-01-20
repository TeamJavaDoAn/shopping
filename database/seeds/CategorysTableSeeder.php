<?php

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Models\Category::class, 10)->create()->each(function($category){
        $category->products()->save(factory(App\Models\Product::class)->make());
      });
    }
}
