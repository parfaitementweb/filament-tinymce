<?php

namespace Parfaitementweb\FilamentTinyMce;

use Spatie\ShikiPhp\Shiki;

class FilamentTinyMceRenderer
{
    public function highlight($expression)
    {
        $regex = '/<pre\s?(?>class="language-([^"]*)")?><code>(.*?)<\/code><\/pre>/s';
        preg_match_all($regex, $expression, $matches, PREG_SET_ORDER);

        $theme = config('filament-tinymce.theme', 'github-dark');

        foreach ($matches as $match) {
            $highlight = $this->getHighlight($match[2], $theme, empty(! $match[1]) ? $match[1] : null);
            $expression = str_replace($match[0], $highlight, $expression);
        }

        return $expression;
    }

    protected function getHighlight($code, $theme, $language = null)
    {
        $cacheKey = $this->getCacheKey($code, $theme, $language);

        return cache()
            ->rememberForever($cacheKey, function () use ($code, $language, $theme) {

                return Shiki::highlight(
                    code: html_entity_decode($code),
                    language: $language,
                    theme: $theme,
                );
            });
    }

    protected function getCacheKey(string $code, string $theme, $language = ''): string
    {
        return md5("highlight{$theme}{$code}{$language}");
    }
}