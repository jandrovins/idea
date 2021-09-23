<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Default admin user
    |--------------------------------------------------------------------------
    |
    | Default user will be created at project installation/deployment
    |
    */

    'admin_name' => env('ADMIN_NAME', 'admin'),
    'admin_email' => env('ADMIN_EMAIL', 'admin@idea.edu'),
    'admin_password' => env('ADMIN_PASSWORD', 'admin'),  // Change this in final release
    'admin_learning_style' => env('ADMIN_LS', 'admin'),
    'admin_dob' => env('ADMIN_DOB', '1990-01-01'),
    'admin_phone_num' => env('ADMIN_PN', '000000000'),
];