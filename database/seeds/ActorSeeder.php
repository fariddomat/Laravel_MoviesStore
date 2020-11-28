<?php

use App\Actor;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actors=[
            "Cruise, Tom",
            "Pacino, Al",
            "Hanks, Tom",
            "Cage, Nicolas",
            "Gibson, Mel",
            "Nolte, Nick",
            "Russell, Kurt",
            "Chaplin, Charlie",
            "Vincent, Frank",
            "Downey Jr., Robert",
            "Expression.Actor",
            "Depp, Johnny",
            "Shearer, Harry",
            "Williams, Treat",
            "Chappelle, Dave",
        ];
        foreach ($actors as $key => $actor) {
            Actor::create([
                'name'=>$actor,
            ]);
        }
    }
}
