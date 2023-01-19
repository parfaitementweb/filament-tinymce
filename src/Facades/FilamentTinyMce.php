<?php

namespace Parfaitementweb\FilamentTinyMce\Facades;

use Illuminate\Support\Facades\Facade;
use Parfaitementweb\FilamentTinyMce\FilamentTinyMceRenderer;

/**
 * @see \Parfaitementweb\FilamentTinyMce\FilamentTinyMce
 */
class FilamentTinyMce extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FilamentTinyMceRenderer::class;
    }
}
