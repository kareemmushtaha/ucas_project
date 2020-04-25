<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class BloggerRestaurantSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = \Faker\Factory::create('App\Blogger');
        for( $i=1 ;$i<=1000 ; $i ++ ){
            DB::table('bloggers')->insert([
                'name' => $faker->name,
                'TypeOf_id' => rand(1,2),
                'email' => $faker->companyEmail,
                'password' =>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'img' => '20200403015543.jpg',
                'Description' => $faker->catchPhrase,
                'is_editor' => $faker->randomDigit,
                'remember_token' =>Str::random(10),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now')
            ]);
        }
    }
}
