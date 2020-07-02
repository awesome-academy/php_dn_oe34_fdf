<?php

use App\Model\Favorite;
use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Favorite::class, 5)->create();
    }
}
