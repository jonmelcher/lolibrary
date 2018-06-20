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

    'default' => env('FILESYSTEM_DRIVER', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 'minio',
            'key' => env('AWS_ACCESS_KEY_ID', 'MinioAccessKey'),
            'secret' => env('AWS_SECRET_ACCESS_KEY', 'SecretExampleKey'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'bucket' => env('AWS_BUCKET', 'lolibrary'),
            'endpoint' => env('AWS_URL', 'http://minio.lolibrary.test:9000'),
            'local' => env('AWS_LOCAL', true),
        ],

        'b2' => [
            'driver' => 'b2',
            'key' => env('BACKBLAZE_KEY'),
            'host' => env('BACKBLAZE_HOST'),
            'bucket' => env('BACKBLAZE_BUCKET'),
            'account' => env('BACKBLAZE_ACCOUNT'),
            'bucket-id' => env('BACKBLAZE_BUCKET_ID'),
        ],
    ],

];