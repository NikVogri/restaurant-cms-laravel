<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $user = User::where('id', 1)->first();
        $user->address()->create([
            'city' => $faker->city(),
            'post_code' => $faker->numberBetween(1, 9999),
            'street_name' => $faker->streetName(),
            'street_num' => $faker->numberBetween(1, 9999)
        ]);
    }
}