<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MealTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('App\model\meal');
        for( $i=1 ;$i<=1000 ; $i ++ ){
            DB::table('meal_resturent')->insert([
                'name' => $faker->name,
                'img' => '20200403015543.jpg',
                'details' => $faker->catchPhrase,
                'price' => $faker->randomDigit,
                'category_id' => rand(1,2),
                'Resturnt_id' =>  rand(1,2),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now')
            ]);
        }
    }
}
