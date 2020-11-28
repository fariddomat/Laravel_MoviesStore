<?php

use Illuminate\Database\Seeder;

class MovieActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actors = ['1', '3', '5'];
        $movies = ['1', '2', '3', '4','5'];
        foreach ($movies as $key => $movie) {
            foreach ($actors as $key => $actor) {
                DB::table('movie_actor')->insert([
                    'movie_id' => $movie,
                    'actor_id' => $actor,
                ]);
            }
        }

        $actors = ['2','4'];
        $movies = ['6', '7', '8', '9','10'];
        foreach ($movies as $key => $movie) {
            foreach ($actors as $key => $actor) {
                DB::table('movie_actor')->insert([
                    'movie_id' => $movie,
                    'actor_id' => $actor,
                ]);
            }
        }
    }
}
