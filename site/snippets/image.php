<?php
use Kirby\Filesystem\F;

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

// Lazy images start with a tiny blurred preview embedded in the page, so the
// space is never empty while scrolling. script.js swaps in the real image once
// it is fully downloaded and decoded (no half-painted images).
$placeholder = null;
if ($loading === 'lazy' && $srcset) {
    try {
        $tiny = $media->thumb(['width' => 32, 'quality' => 60]);
        if ($tiny->exists() === false) {
            $tiny->save();
        }
        $placeholder = 'data:' . $tiny->mime() . ';base64,' . base64_encode(F::read($tiny->root()));
    } catch (\Throwable $e) {
        $placeholder = null;
    }
}
?>
<?php if ($placeholder): ?>
<img
    class="<?= trim($class . ' lazy-image') ?>"
    src="<?= $placeholder ?>"
    data-src="<?= $src ?>"
    data-srcset="<?= $srcset ?>"
    sizes="<?= $sizes ?>"<?php if ($width && $height): ?>
    width="<?= $width ?>"
    height="<?= $height ?>"<?php endif ?>
    alt="<?= $media->alt() ?>"
    decoding="async" />
<noscript><img class="<?= $class ?>" src="<?= $src ?>" srcset="<?= $srcset ?>" sizes="<?= $sizes ?>"<?php if ($width && $height): ?> width="<?= $width ?>" height="<?= $height ?>"<?php endif ?> alt="<?= $media->alt() ?>" loading="lazy" /></noscript>
<?php else: ?>
<img
    class="<?= $class ?>"
    src="<?= $src ?>"<?php if ($srcset): ?>
    srcset="<?= $srcset ?>"
    sizes="<?= $sizes ?>"<?php endif ?><?php if ($width && $height): ?>
    width="<?= $width ?>"
    height="<?= $height ?>"<?php endif ?>
    alt="<?= $media->alt() ?>"
    loading="<?= $loading ?>"<?php if ($loading === 'eager'): ?> fetchpriority="high"<?php endif ?> />
<?php endif ?>
