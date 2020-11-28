<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('orders')->insert([
                'user_id' => 1,
                'movies_id' => $i,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'cc_number' => Str::random(12),
                'cc_month' => $i,
                'cc_year' => 2022,
                'cvv' => $i . $i . $i,
                'created_at' => now()
            ]);
        }
        for ($i = 5; $i < 10; $i++) {
            DB::table('orders')->insert([
                'user_id' => 1,
                'movies_id' => $i,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'cc_number' => Str::random(12),
                'cc_month' => $i,
                'cc_year' => 2022,
                'cvv' => $i . $i . $i,
                'created_at' => '2020-10-14 00:00:00',
            ]);
        }
        for ($i = 2; $i < 6; $i++) {
            DB::table('orders')->insert([
                'user_id' => 1,
                'movies_id' => $i,
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'cc_number' => Str::random(12),
                'cc_month' => $i,
                'cc_year' => 2022,
                'cvv' => $i . $i . $i,
                'created_at' => '2020-11-16 00:00:00',
            ]);
        }
    }
}
