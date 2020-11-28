<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['Action','Drama','Comedy','Horrors','Romantic','Kids'];
        foreach ($categories as $key => $category) {
            Category::create([
                'name'=>$category,
            ]);
        }
    }
}
