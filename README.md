# Filament TinyMce Editor

[![Latest Version on Packagist](https://img.shields.io/packagist/v/parfaitementweb/filament-tinymce.svg?style=flat-square)](https://packagist.org/packages/parfaitementweb/filament-tinymce)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/parfaitementweb/filament-tinymce/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/parfaitementweb/filament-tinymce/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/parfaitementweb/filament-tinymce/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/parfaitementweb/filament-tinymce/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/parfaitementweb/filament-tinymce.svg?style=flat-square)](https://packagist.org/packages/parfaitementweb/filament-tinymce)

TinyMce Editor for Filament PHP.

## Installation

You can install the package via composer:

```bash
composer require parfaitementweb/filament-tinymce
php artisan vendor:publish --tag=filament-tinymce-assets
php artisan vendor:publish --tag=filament-tinymce-config
```

## Usage

```php
\Parfaitementweb\FilamentTinyMce::make('text')->required()
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
