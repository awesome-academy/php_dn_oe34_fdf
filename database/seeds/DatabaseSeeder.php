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
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SuggestsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(RatingsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
    }
}
