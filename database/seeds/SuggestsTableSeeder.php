<?php

use App\Model\Suggest;
use Illuminate\Database\Seeder;

class SuggestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Suggest::class, 5)->create();
    }
}
