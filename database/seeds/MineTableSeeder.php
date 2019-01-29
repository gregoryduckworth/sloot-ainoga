<?php

use App\Models\Mine;
use Illuminate\Database\Seeder;

class MineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mines = ['copper', 'tin'];
        foreach ($mines as $mine) {
            Mine::insert([
                'type' => $mine,
            ]);
        }
    }
}
