<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */
    'mailgun' => [
        'domain' => 'sandbox56f840fe90394f34bc21f4fd28a1237a.mailgun.org',
        'secret' => 'key-dee396ab4fbca0f012be139d488deac7',
    ],
    

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => 'pk_test_TTmBAStWsllPSRCQMQDjfAMb ',
        'secret' => 'sk_test_zdXuKZ6eCCV8r8sGDROmajgZ ',
    ],

];
