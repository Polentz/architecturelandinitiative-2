<?php

use Kirby\Toolkit\Str;

$parentPage = $media->parent();
$selectFiltersOptions = $parentPage->blueprint()->field('selectFilters')['options'] ?? [];

?>

<figcaption class="gallery-item-caption">
    <div class="text-label">
        <?php if ($page->intendedTemplate()->name() === 'project' && $media->category()->isNotEmpty()) : ?>
            <p>Category: <?= $media->category() ?></p>
        <?php endif ?>
        <?php if ($page->intendedTemplate()->name() === 'tool' && $media->parent()->intendedTemplate()->name() === 'project') : ?>
            <p>Related project: <a href="<?= $media->parent()->url() ?>"><?= $media->parent()->title() ?></a></p>
        <?php endif ?>
    </div>
    <?php if ($media->caption()->isNotEmpty()) : ?>
        <hr>
        <div class="text-label">
            <?= $media->caption()->kt() ?>
        </div>
    <?php endif ?>
    <?php if ($media->info()->isNotEmpty()): ?>
        <div class="caption-text text-subtext">
            <?= $media->info()->kt() ?>
        </div>
    <?php endif ?>
</figcaption>