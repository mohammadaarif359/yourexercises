<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],
		
		'protected' => [
            'driver' => 'local',
            'root' => storage_path('app/protected'),
            'visibility' => 'private',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],
		'users' => [
            'driver' => 'local',
            'root' => storage_path('app/public/users'),
            'url' => env('APP_URL') . '/users',
            'visibility' => 'public',
        ],
		'notifications' => [
            'driver' => 'local',
            'root' => storage_path('app/public/notifications'),
            'url' => env('APP_URL') . '/notifications',
            'visibility' => 'public',
        ],
        'category' => [
            'driver' => 'local',
            'root' => storage_path('app/public/category'),
            'url' => env('APP_URL') . '/category',
            'visibility' => 'public',
        ],
        'subcategory' => [
            'driver' => 'local',
            'root' => storage_path('app/public/subcategory'),
            'url' => env('APP_URL') . '/subcategory',
            'visibility' => 'public',
        ],
        'exercise' => [
            'driver' => 'local',
            'root' => storage_path('app/public/exercise'),
            'url' => env('APP_URL') . '/exercise',
            'visibility' => 'public',
        ],
        'plan' => [
            'driver' => 'local',
            'root' => storage_path('app/public/plan'),
            'url' => env('APP_URL') . '/plan',
            'visibility' => 'public',
        ],
        'doctor/exercise' => [
            'driver' => 'local',
            'root' => storage_path('app/public/doctor/exercise'),
            'url' => env('APP_URL') . '/doctor/exercise',
            'visibility' => 'public',
        ],
        'doctor/plan' => [
            'driver' => 'local',
            'root' => storage_path('app/public/doctor/plan'),
            'url' => env('APP_URL') . '/doctor/plan',
            'visibility' => 'public',
        ],
        'doctor/profile' => [
            'driver' => 'local',
            'root' => storage_path('app/public/doctor/profile'),
            'url' => env('APP_URL') . '/doctor/profile',
            'visibility' => 'public',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
