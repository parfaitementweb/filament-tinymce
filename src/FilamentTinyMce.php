<?php

namespace Parfaitementweb\FilamentTinyMce;
use Filament\Forms\Components\Field;

class FilamentTinyMce extends Field
{
    protected string $view = 'filament-tinymce::filament-tinymce';

    protected function setUp(): void
    {
        parent::setUp();
    }
}

