# laravel-github-storage

A GitHub based filesystem for Laravel, powered by [php-github-api](https://github.com/KnpLabs/php-github-api).

**Note**: Keep in mind that GitHub has a rate limit, so if you need a lot of file operations you might
need something else.

## Installation

```bash
composer require atomicptr/laravel-github-storage
```

Add a new disk to your filesystems.php configuration file

```php
'github' => [
    'driver' => 'github',
    'token' => env('GITHUB_STORAGE_TOKEN', ''),
    'username' => env('GITHUB_STORAGE_USERNAME', ''),
    'repository' => env('GITHUB_STORAGE_REPOSITORY', ''),
    'branch' => env('GITHUB_STORAGE_BRANCH', 'master'),
    'prefix' => env("GITHUB_STORAGE_PREFIX", ''),
],
```

## Usage

```php
<?php

$storage = Storage::disk('github');

if (! $storage->exists('assets/image.jpg')) {
    $storage->put('assets/', $imageFileContent);
}

// See https://laravel.com/docs/filesystem
````

## License

MIT