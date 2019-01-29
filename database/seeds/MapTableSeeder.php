<?php

use App\Models\Map;
use Illuminate\Database\Seeder;

class MapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x < 401; $x++) {
            for ($y = 1; $y < 401; $y++) {
                Map::insert([
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
