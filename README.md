# A minimal notes package for Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alphaolomi/laravel-notes.svg?style=flat-square)](https://packagist.org/packages/alphaolomi/laravel-notes)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/alphaolomi/laravel-notes/run-tests?label=tests)](https://github.com/alphaolomi/laravel-notes/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/alphaolomi/laravel-notes/Check%20&%20fix%20styling?label=code%20style)](https://github.com/alphaolomi/laravel-notes/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/alphaolomi/laravel-notes.svg?style=flat-square)](https://packagist.org/packages/alphaolomi/laravel-notes)

Add Notes to your models in your Laravel Applications.

## Installation

You can install the package via Composer:

```bash
composer require alphaolomi/laravel-notes
```

The package automatically registers migrations so there's no need to publish anything, just run them.

```
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-notes-config"
```

