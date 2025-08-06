<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Storage;
use League\Flysystem\Filesystem;
use Masbug\Flysystem\GoogleDriveAdapter;
use Google_Client;
use Google_Service_Drive;

class GoogleDriveServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('google', function ($app, $config) {
            $client = new Google_Client();
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);

            $service = new Google_Service_Drive($client);

            $adapter = new GoogleDriveAdapter($service, $config['folderId'] ?? null);

            return new Filesystem($adapter);
        });
    }
}
