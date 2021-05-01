# Laravel HTTPS Checker


Laravel Https is package is created to check for Secure HTTP requests. Laravel Https provides a middleware to force redirection to HTTPS Protocol.


[![Latest Version on Packagist](https://img.shields.io/packagist/v/benjaber-98/laravel-https.svg?style=flat-square)](https://packagist.org/packages/benjaber-98/laravel-https)
[![Total Downloads](https://img.shields.io/packagist/dt/benjaber-98/laravel-https.svg?style=flat-square)](https://packagist.org/packages/benjaber-98/laravel-https)


## Installation

You can install the package via composer:

```bash
composer require benjaber-98/laravel-https
```

You can publish the config file with:
```bash
php artisan vendor:publish
```
Then choose the number of package service provider from the list.

This is the contents of the published config file:
```bash
<?php

return [
    'force_in_local' => env('FORCE_HTTPS_IN_LOCAL', false),
];
```
By default package is disabled in local environment, if you want to turn it on you can set `FORCE_HTTPS_IN_LOCAL` in `.env` file like this:
```bash
FORCE_HTTPS_IN_LOCAL=true
```

### Usage

##### Basic Usage:
* Add `\Benjaber98\LaravelHttps\Middlewares\ForceHttpMiddleware::class` to your Kernel file like this:

```php
// app/Http/Kernel.php

...

//use it globally for all requests
protected $middleware = [
     ...
    \Benjaber98\LaravelHttps\Middlewares\ForceHttpMiddleware::class,
];
    
...

// Or use it globally for all web requests
protected $middlewareGroups = [
   'web' => [
       ...
       \Benjaber98\LaravelHttps\Middlewares\ForceHttpMiddleware::class,
   ],

...
//Or register it to use in routes
protected $routeMiddleware = [
   ...
   'force_https' => \Benjaber98\LaravelHttps\Middlewares\ForceHttpMiddleware::class,
];

```

###### Route Group Example:

```php
    Route::group(['middleware' => ['force_https']], function () {
        Route::get('/', ['PageController', 'index']);
    });
```

###### Individual Route Examples:

```php
    Route::get('/', ['PageController', 'welcome'])->middleware('force_https');
```

##### From Controller File:
* You can include the `force_https` middleware in the constructor of your controller file.

###### Controller File Example:

```php
    public function __construct()
    {
       $this->middleware('force_https');
    }
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Mahmoud Ben Jabir](https://github.com/Benjaber-98)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
