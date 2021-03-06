<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesList = ['Fast food', 'Sea food', 'Pizzas', 'Hamburger', 'Kebab'];

        foreach ($categoriesList as $item) {
            DB::table('categories')->insert(['name' => $item]);
        }
    }
}