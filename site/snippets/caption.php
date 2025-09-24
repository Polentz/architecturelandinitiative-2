<?php

$parentPage = $media->parent();
$selectFiltersOptions = $parentPage->blueprint()->field('selectFilters')['options'] ?? [];

?>

<figcaption class="gallery-item-caption">
    <div class="text-label">
        <?php foreach ($page->selectFilters()->split() as $filter) : ?>
            <?php if ($media->{$filter}()->isNotEmpty()) : ?>
                <?php $label = t('filters.' . $filter, $filter); ?>
                <?php if ($filter === 'tool' || $filter === 'project') : ?>
                    <p><?= $label ?>: <a href="<?= $media->{$filter}()->isNotEmpty() ? $media->{$filter}()->toPage()->url() : '' ?>"><?= $media->{$filter}()->isNotEmpty() ? $media->{$filter}()->toPage()->title() : '' ?></a></p>
                <?php else : ?>
                    <p><?= $label ?>: <?= $media->{$filter}() ?></p>
                <?php endif ?>
            <?php endif ?>
        <?php endforeach ?>
        <?php if ($media->category()->isNotEmpty()) : ?>
            <p><?= t('filters.category') ?>: <?= $media->category() ?></p>
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