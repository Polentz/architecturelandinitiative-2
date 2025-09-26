<?php

$categoryKey = $media->category()->value();
$categoryLabel = null;
if ($categoryKey) {
    $categoryItem = site()->categories()->toStructure()->findBy('key', $categoryKey);
    if ($categoryItem) {
        $categoryLabel = $categoryItem->filter();
    }
}

$getFilterLabels = function ($media, $filter, $structureMap) {
    $valueLabel = $media->{$filter}()->value();
    if (isset($structureMap[$filter])) {
        $structureItem = $structureMap[$filter]->findBy('key', $valueLabel);
        if ($structureItem) {
            $valueLabel = $structureItem->filter();
        }
    }
    return $valueLabel;
}

?>

<figcaption class="gallery-item-caption">
    <div class="text-label">

        <?php foreach ($page->selectFilters()->split() as $filter) : ?>
            <?php if ($media->{$filter}()->isNotEmpty()) : ?>

                <?php $label = t('filters.' . $filter); ?>

                <?php if ($filter === 'tool') : ?>
                    <?php if ($related = $media->tool()->toPage()): ?>
                        <p><?= $label ?>: <a href="<?= $related->url() ?>"><?= $related->title() ?></a></p>
                    <?php endif ?>
                <?php elseif ($filter === 'project') : ?>
                    <?php if ($related = $media->project()->toPage()): ?>
                        <p><?= $label ?>: <a href="<?= $related->url() ?>"><?= $related->title() ?></a></p>
                    <?php endif ?>
                <?php else : ?>
                    <p><?= $label ?>: <?= $getFilterLabels($media, $filter, $structureMap) ?></p>
                <?php endif ?>

            <?php endif ?>
        <?php endforeach ?>

        <?php if ($categoryLabel) : ?>
            <p><?= t('filters.category') ?>: <?= $categoryLabel ?></p>
        <?php endif ?>

        <?php if ($media->caption()->isNotEmpty()) : ?>
            <?php if ($categoryLabel || $page->selectFilters()->isNotEmpty()) : ?>
                <hr>
            <?php endif ?>
            <div class="text-label">
                <?= $media->caption()->kt() ?>
            </div>
        <?php endif ?>

        <?php if ($media->info()->isNotEmpty()): ?>
            <div class="caption-text text-subtext">
                <?= $media->info()->kt() ?>
            </div>
        <?php endif ?>

    </div>
</figcaption>