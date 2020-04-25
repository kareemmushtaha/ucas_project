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
        // $this->call(UsersTableSeeder::class);
         $this->call(MealTableSeeder::class);
         $this->call(CategoryTableSedder::class);
         $this->call(BloggerRestaurantSedder::class);
    }
}
