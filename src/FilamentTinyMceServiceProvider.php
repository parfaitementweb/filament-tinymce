<?php

namespace Parfaitementweb\FilamentTinyMce;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Parfaitementweb\FilamentTinyMce\Commands\FilamentTinyMceCommand;

class FilamentTinyMceServiceProvider extends PluginServiceProvider
{
    protected array $beforeCoreScripts = [
        'filament-tinymce-scripts' => __DIR__ . '/../resources/dist-inc/filament-tinymce.js',
    ];

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-tinymce')
            ->hasConfigFile()
            ->hasAssets()
            ->hasViews();
    }
}
