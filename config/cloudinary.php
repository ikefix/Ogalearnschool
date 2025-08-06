<?php

return [

    // This is optional if you're using CLOUDINARY_URL
    'cloud' => [
        'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
        'api_key'    => env('CLOUDINARY_API_KEY'),
        'api_secret' => env('CLOUDINARY_API_SECRET'),
    ],

    // Optional secure URL setting
    'url' => [
        'secure' => env('CLOUDINARY_SECURE', true),
    ],

    // Optional full cloudinary url
    'cloud_url' => env('CLOUDINARY_URL'),
];
