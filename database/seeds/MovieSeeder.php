<?php

use App\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
            "Terminator, The",
            "Terminator 2: Judgement Day",
            "Mummy, The",
            "Casablanca",
            "Spinal Tap",
            "Aliens",
            "Independence Day",
            "A beautiful mind",
            "A Few Good Men",
            "Last of the Mohicans",
            "Matrix, The",
            "Lord of the Rings: The Fellowship of the Ring, The",
            "A beautiful mind",
            "American Beauty",
            "Star Wars Episode I: The Phantom Menace",
            "Star Wars Episode II: Attack of the Clones",
            "Star Wars Episode V: Empire Strikes Back",
            "Star Wars Episode VI: Return of the Jedi",
            "Indiana Jones and the Last Crusade",
            "Indiana Jones and the Raiders of the Lost Ark",
            "Saving Private Ryan",
            "Big",
            "American Pie",
            "A Fish Called Wanda",
            "Abyss, The",
            "Almost Famous",
            "American History X",
            "Akira",
            "Alien",
        ];
        foreach ($movies as $key => $movie) {
            Movie::create([
                'name' => $movie,
                'price' => '100',
                'description' => Str::random(25),
                'poster' => 'poster.jpg',
                'image' => 'poster.jpg',
                'path' => 'path',
                'year' => '2010',
                'rating' => '8',
                'director_id' => '1',
            ]);
        }
    }
}
