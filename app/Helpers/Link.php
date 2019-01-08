<?php

namespace App\Helpers;

class Link
{
    static public function shorten($url)
    {
        $link = config('app.url') . '/links?code=' . json_decode(file_get_contents(config('app.url') . '/api/links?url=' . urlencode($url)))->code ?? null;

        return $link;
    }
}
