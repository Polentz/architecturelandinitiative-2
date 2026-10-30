<?php

use Kirby\Cms\App as Kirby;

/**
 * Adds ?v=<last modified time> to local CSS/JS URLs,
 * so browsers can cache them long-term but still get edits right away.
 */
$addVersion = function (Kirby $kirby, string $url): string {
    $base     = rtrim($kirby->url('index'), '/');
    $relative = ltrim(str_starts_with($url, $base) ? substr($url, strlen($base)) : $url, '/');

    // leave external URLs alone
    if (str_contains($relative, '://')) {
        return $url;
    }

    $file = $kirby->root('index') . '/' . $relative;

    return is_file($file) ? $url . '?v=' . filemtime($file) : $url;
};

Kirby::plugin('architecturelandinitiative/cache-busting', [
    'components' => [
        'css' => fn (Kirby $kirby, string $url, $options = null): string => $addVersion($kirby, $url),
        'js'  => fn (Kirby $kirby, string $url, $options = null): string => $addVersion($kirby, $url),
    ],
]);
