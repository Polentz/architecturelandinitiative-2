<?php

use Kirby\Toolkit\Str;

$relatedProject = $block->project()->toPage();
$relatedProjectTitle = $relatedProject ? $relatedProject->title() : null;
$relatedProjectUrl = $relatedProject ? $relatedProject->url() : null;


// Get itemtype key & label
$itemtypeKey   = $block->itemtype()->value();
$itemtypeLabel = $itemtypeKey;
if ($itemtypeKey && isset($structureMap['itemtype'])) {
    $itemtypeStructure = $structureMap['itemtype']->findBy('key', $itemtypeKey);
    if ($itemtypeStructure) $itemtypeLabel = $itemtypeStructure->filter();
}

$blockAttributes = function ($block) {
    $itemtypeKey = $block->itemtype()->value() ?? '';
    $membersKey = $block->members() ?? '';

    $projectSlug = ($related = $block->project()->toPage()) ? Str::slug($related->title()) : '';

    return
        'data-date="' . $block->date() . '" ' .
        'data-title="' . Str::slug($block->title()) . '" ' .
        'data-type="' . Str::slug($itemtypeKey) . '" ' .
        'data-project="' . $projectSlug . '"' .
        'data-members="' . ($membersKey ?? '') . '"';
};
?>

<div class="accordion sortable" <?= $blockAttributes($block) ?>>
    <ul class="accordion-topbar accordion-opener">
        <li class="accordion-topbar-item text-label"><?= $block->title() ?></li>
        <li class="accordion-topbar-item text-label"><?= $block->eventdate() ?></li>
        <li class="accordion-topbar-item text-label"><?= $itemtypeLabel ?></li>
        <?php if ($block->where()->isNotEmpty()) : ?>
            <li class="accordion-topbar-item text-label"><?= $block->where() ?></li>
        <?php else : ?>
            <li class="accordion-topbar-item text-label">-</li>
        <?php endif ?>
        <?php if ($block->project()->isNotEmpty()) : ?>
            <li class="accordion-topbar-item text-label"><?= $relatedProjectTitle ?></li>
        <?php else : ?>
            <li class="accordion-topbar-item text-label">-</li>
        <?php endif ?>
    </ul>
    <ul class="accordion-items">
        <li class="accordion-title">
            <h3 class="title"><?= $block->title() ?></h3>
            <?php if ($block->subtitle()->isNotEmpty()) : ?>
                <p class="text-subtext"><?= $block->subtitle() ?></p>
            <?php endif ?>
        </li>
        <li class="accordion-content">
            <div class="accordion-text">
                <?php if ($block->body()->isNotEmpty()) : ?>
                    <div class="text">
                        <?= $block->body()->kt() ?>
                    </div>
                <?php endif ?>
                <?php if ($block->credits()->isNotEmpty()) : ?>
                    <div class="text-caption">
                        <?= $block->credits()->kt() ?>
                    </div>
                <?php endif ?>
                <?php if ($block->info()->isNotEmpty()) : ?>
                    <div class="text-subtext">
                        <?= $block->info()->kt() ?>
                    </div>
                <?php endif ?>

                <?php if ($block->toggleProject()->isTrue()) : ?>
                    <a href="<?= $relatedProjectUrl ?>" class="button " type="button">
                        <span class="text-label"><?= $relatedProjectTitle ?></span>
                    </a>
                <?php endif ?>
            </div>
            <?php if ($image = $block->image()->toFile()) : ?>
                <figure class="accordion-image">
                    <img class="image lazy" src="" data-src="<?= $image->resize(1200, null)->url() ?>" alt="<?= $image->alt() ?>">
                    <?php if ($block->imagecaption()->isNotEmpty()) : ?>
                        <figcaption class="text-label"><?= $block->imagecaption()->kt() ?></figcaption>
                    <?php endif ?>
                </figure>
            <?php endif ?>
        </li>
    </ul>
</div>