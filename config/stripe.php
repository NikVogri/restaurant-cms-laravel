<?php

return [

  /*
    |--------------------------------------------------------------------------
    | Stripe Configuration
    |--------------------------------------------------------------------------
    |
    | This option is set up for stripe configuration. Please change the defaults 
    | in your .ENV file!
    | 
    */

  'stripe' => [
    'stripeKey' =>  env('STRIPE_KEY', ''),
    'stripeSecret' =>  env('STRIPE_SECRET', ''),
  ]
];