<?php
/**
 * Responsive image snippet.
 *
 * @var Kirby\Cms\File $media    The image file
 * @var string $class            CSS class (default: 'image')
 * @var string $loading          'lazy' (default) or 'eager' for above-the-fold
 * @var array  $widths           srcset widths in px
 * @var string $sizes            The `sizes` attribute (default: 100vw)
 * @var int    $default          Fallback src width (default: 1200)
 */
$class   = $class   ?? 'image';
$loading = $loading ?? 'lazy';
$widths  = $widths  ?? [600, 900, 1200, 1800];
$sizes   = $sizes   ?? '100vw';
$default = $default ?? 1200;

try {
    // Intrinsic dimensions (read from the original's header — cheap, no thumb generated)
    $width  = $media->width();
    $height = $media->height();
    $src    = $media->resize($default, null)->url();
    $srcset = $media->srcset($widths);
} catch (\Throwable $e) {
    // Corrupt / unreadable source: fall back to the original, skip srcset,
    // and never take the whole page down over one bad file.
    $width = $height = null;
    $src    = $media->url();
    $srcset = null;
}
?>
<img
    class="<?= $class ?>"
    src="<?= $src ?>"<?php if ($srcset): ?>
    srcset="<?= $srcset ?>"
    sizes="<?= $sizes ?>"<?php endif ?><?php if ($width && $height): ?>
    width="<?= $width ?>"
    height="<?= $height ?>"<?php endif ?>
    alt="<?= $media->alt() ?>"
    loading="<?= $loading ?>"<?php if ($loading === 'eager'): ?> fetchpriority="high"<?php endif ?> />
