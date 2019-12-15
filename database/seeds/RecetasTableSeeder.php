<?php

use App\Receta;
use App\User;
use Illuminate\Database\Seeder;

class RecetasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Receta::class, 10)->create();
    }
}
