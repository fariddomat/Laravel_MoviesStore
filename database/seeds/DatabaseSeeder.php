<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(LaratrustSeeder::class);

         $this->call(UsersTableSeeder::class);

         $this->call(CategoriesSeeder::class);

         $this->call(ActorSeeder::class);

         $this->call(DirectorSeeder::class);

         $this->call(MovieSeeder::class);

         $this->call(MovieActorsSeeder::class);

         $this->call(MovieCategorySeeder::class);
         
        $this->call(OrderSeeder::class);




    }
}
