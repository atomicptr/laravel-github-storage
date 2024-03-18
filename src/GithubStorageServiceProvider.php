<?php

namespace Atomicptr\LaravelGithubStorage;

use Atomicptr\FlysystemGithub\Credentials;
use Atomicptr\FlysystemGithub\GithubAdapter;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class GithubStorageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Storage::extend('github', function ($app, $config) {
            $adapter = new GithubAdapter(
                $config['username'],
                $config['repository'],
                credentials: Credentials::fromToken($config['token']),
                branch: empty($config['branch']) ? null : $config['branch'],
                prefix: $config['prefix'],
            );

            return new FilesystemAdapter(
                new Filesystem($adapter),
                $adapter
            );
        });
    }
}
