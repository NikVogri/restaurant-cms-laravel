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
        $categoriesList = ['Cash on Delivery', 'Credit Card', 'Paypal'];

        foreach ($categoriesList as $item) {
            DB::table('payment_types')->insert(['name' => $item]);
        }
    }
}