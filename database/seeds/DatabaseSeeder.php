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
        for($x = 1; $x < 401; $x++) {
          for($y = 1; $y < 401; $y++) {
            DB::table('map')->insert([
              'x' => $x,
              'y' => $y,
              'image' => '',
              'info' => '',
            ]);
            echo $x . ',' . $y . "\r\n";
          }
        }
    }
}
