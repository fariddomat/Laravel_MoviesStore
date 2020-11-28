<?php

use Illuminate\Database\Seeder;

class MovieCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['1', '3', '5','2','6'];
        $movies = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];
        foreach ($movies as $key => $movie) {
            foreach ($categories as $key => $category) {
                DB::table('movie_category')->insert([
                    'movie_id' => $movie,
                    'category_id' => $category,
                ]);
            }
        }
    }
}
