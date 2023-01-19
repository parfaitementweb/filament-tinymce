<?php

namespace Parfaitementweb\FilamentTinyMce;

use Spatie\ShikiPhp\Shiki;

class FilamentTinyMceRenderer
{
    public function highlight($expression)
    {
        $expression = html_entity_decode($expression);

        $regex = '/<pre(?:[^>]+)?><code>(.*?)<\/code><\/pre>/s';
        $regex_with_class = '/<pre[^>]*class="language-([^"]*)"[^>]*><code>(.*?)<\/code><\/pre>/s';

        preg_match($regex, $expression, $matches);
        preg_match($regex_with_class, $expression, $matches_with_class);

        $theme = config('filament-tinymce.theme', 'github-dark');

        if (isset($matches_with_class[2])) {
            $highlight = $this->getHighlight($matches_with_class[2], $theme, $matches_with_class[1]);

            return str_replace($matches_with_class[0], $highlight, $expression);
        }

        if (isset($matches[1])) {
            $highlight = $this->getHighlight($matches[1], $theme);

            return str_replace($matches[0], $highlight, $expression);
        }

        return $expression;
    }

    protected function getHighlight($code, $theme, $language = null)
    {
        $cacheKey = $this->getCacheKey($code, $theme, $language);

        return cache()
            ->rememberForever($cacheKey, function () use ($code, $language, $theme) {

                return Shiki::highlight(
                    code: $code,
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