<?php

namespace Parfaitementweb\FilamentTinyMce;

use Filament\Forms\Components\Field;
use Filament\Forms\Components\Concerns;
use Filament\Forms\Components\Contracts;
use Illuminate\Support\Facades\Vite;

class FilamentTinyMce extends Field implements Contracts\CanBeLengthConstrained, Contracts\HasFileAttachments
{
    protected $contentStyle = null;
    protected $disableCssPath = false;

    use Concerns\CanBeLengthConstrained;
    use Concerns\HasFileAttachments;

    protected string $view = 'filament-tinymce::filament-tinymce';

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function disableCssPath(): static
    {
        $this->disableCssPath = true;

        return $this;
    }

    public function getCssPath(): string
    {
        if ($this->disableCssPath) {
            return false;
        }

        return config('filament-tinymce.css') ? Vite::asset(config('filament-tinymce.css')) : "/vendor/filament-tinymce/skins/content/default/content.min.css";
    }

    public function contentStyle(string|null $style): static
    {
        $this->contentStyle = str_replace(array("\r", "\n"), '', $style);

        return $this;
    }

    public function getContentStyle(): null|string
    {
        return $this->contentStyle;
    }

}

