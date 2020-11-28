<?php

use App\Director;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directors=['Director1','Director2','Director3'];
        foreach ($directors as $key => $director) {
            Director::create([
                'name'=>$director,
            ]);
        }
    }
}
