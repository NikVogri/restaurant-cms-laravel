<?php

use Illuminate\Database\Seeder;

class PaymentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoriesList = ['Credit Card', 'On Delivery', 'Paypal'];

        foreach ($categoriesList as $item) {
            DB::table('payment_types')->insert(['name' => $item]);
        }
    }
}