<?php

use App\Models\Pacote;
use Illuminate\Database\Seeder;

class PacotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Pacote::class, 5)->create();
    }
}
