<?php

use Illuminate\Database\Seeder;
use App\Item;
use Faker\Generator as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $items = [
            ['name' => 'Hamburger', 'price' => 3, 'category_id' => 4],
            ['name' => 'Cheeseburger', 'price' => 4, 'category_id' => 4],
            ['name' => 'Cheese Pizza', 'price' => 8, 'category_id' => 3],
            ['name' => 'Pizza', 'price' => 7, 'category_id' => 3],
            ['name' => 'Doner Kebab', 'price' => 4, 'category_id' => 5],
            ['name' => 'Shish Kebab', 'price' => 5, 'category_id' => 5],
            ['name' => 'Fries', 'price' => 2, 'category_id' => 1],
            ['name' => 'Lasagna', 'price' => 6, 'category_id' => 1],
            ['name' => 'Fish Platter', 'price' => 12, 'category_id' => 2],

        ];
        $index = 1;
        foreach ($items as $item) {
            $createItem = new Item;
            $createItem->name = $item['name'];
            $createItem->image = "items/" . $index . ".jpg";
            $createItem->price = $item['price'];
            $createItem->description = $faker->text(200);
            $createItem->category_id = $item['category_id'];
            $createItem->save();
            $index++;
        }
    }
}