<?php

use Kirby\Toolkit\Str;

$pageBlocks = $page->blocks()->toBlocks();
$selectFilters = $page->selectFilters()->split();

$getFilterLabels = function ($collection, string $field, array $structureMap = []): array {
    $labels = [];
    foreach ($collection as $item) {
        if ($item->{$field}()->isEmpty()) continue;

        $values = $item->{$field}()->split();

        foreach ($values as $key) {
            $label = $key;
            if (isset($structureMap[$field])) {
                $structureItem = $structureMap[$field]->findBy('key', $key);
                if ($structureItem) $label = $structureItem->filter();
            }
            $labels[$key] = $label;
        }
    }
    asort($labels);
    return $labels;
};

$getRelatedArray = function ($collection, string $fieldName): array {
    $related = [];
    foreach ($collection as $item) {
        if ($item->{$fieldName}()->isEmpty()) continue;
        $pageItem = $item->{$fieldName}()->toPage();
        if ($pageItem) $related[$pageItem->id()] = $pageItem;
    }
    $relatedPages = array_values($related);
    usort($relatedPages, fn($a, $b) => strcmp($a->title(), $b->title()));
    return $relatedPages;
};

?>

<div class="filters">
    <div class="buttons-wrapper">
        <button class="ui-button top-button" type="button">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.5" width="39" height="39" fill="#1d1d1b" />
                <path d="M20 8L30 19.25M20 8L10 19.25M20 8L20 32" stroke="#ffffff" />
            </svg>
        </button>
        <?php if (!empty($selectFilters)) : ?>
            <button class="ui-button filter-button" type="button">
                <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="39" height="39" fill="#1d1d1b" />
                    <path d="M7 12H33M7 20H33M7 28H33" stroke="#ffffff" />
                    <circle cx="14" cy="12" r="2.5" fill="#1d1d1b" stroke="#ffffff" />
                    <circle cx="26" cy="20" r="2.5" fill="#1d1d1b" stroke="#ffffff" />
                    <circle cx="14" cy="28" r="2.5" fill="#1d1d1b" stroke="#ffffff" />
                    <rect x="0.5" y="0.5" width="39" height="39" stroke="#1d1d1b" />
                </svg>
                <span class="filter-button-counter text">1</span>
            </button>
        <?php endif ?>
    </div>

    <?php if (!empty($selectFilters)) : ?>
        <div class="filters-wrapper">

            <?php foreach ($selectFilters as $filter) : ?>
                <?php $label = t('filters.' . $filter); ?>
                <div class="filter-header text-subtext">
                    <p><?= t('filter-by') ?> <?= strtolower($label) ?></p>
                </div>

                <!-- Project Filters -->
                <?php if ($slots->projectFilters()) : ?>
                    <ul class="filter-list text-label">
                        <?php if (isset($structureMap[$filter])) : ?>
                            <?php foreach ($getFilterLabels($galleryFiles, $filter, $structureMap) as $key => $label) : ?>
                                <li id="<?= Str::slug($key) ?>" class="filter"><?= $label ?></li>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?php $relatedPages = $getRelatedArray($galleryFiles, 'tool'); ?>
                            <?php foreach ($relatedPages as $related) : ?>
                                <li id="<?= Str::slug($related->title()) ?>" class="filter"><?= $related->title() ?></li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                <?php endif ?>

                <!-- Tool Filters -->
                <?php if ($slots->toolFilters()) : ?>
                    <ul class="filter-list text-label">
                        <?php if (isset($structureMap[$filter])) : ?>
                            <?php foreach ($getFilterLabels($galleryFiles, $filter, $structureMap) as $key => $label) : ?>
                                <li id="<?= Str::slug($key) ?>" class="filter"><?= $label ?></li>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?php $relatedPages = $getRelatedArray($galleryFiles, 'project'); ?>
                            <?php foreach ($relatedPages as $related) : ?>
                                <li id="<?= Str::slug($related->title()) ?>" class="filter"><?= $related->title() ?></li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                <?php endif ?>

                <!-- Platform Filters -->
                <?php if ($slots->itemtypes()) : ?>
                    <ul class="filter-list text-label">
                        <?php if (isset($structureMap[$filter])) : ?>
                            <?php $labels = $getFilterLabels($pageBlocks, $filter, $structureMap); ?>
                            <?php foreach ($labels as $key => $label) : ?>
                                <li <?php if ($filter === 'members') : ?>data-key="<?= $key ?>" <?php else : ?>id="<?= Str::slug($key) ?>" <?php endif ?> class="filter">
                                    <?= $label ?>
                                </li>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?php $relatedPages = $getRelatedArray($pageBlocks, 'project'); ?>
                            <?php foreach ($relatedPages as $related) : ?>
                                <li id="<?= Str::slug($related->title()) ?>" class="filter"><?= $related->title() ?></li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                <?php endif ?>

            <?php endforeach ?>

            <div id="all" class="filter filter-deselect text-label">
                <span><?= t('all') ?></span>
            </div>

            <button class="ui-button x-button" type="button">
                <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="39" height="39" fill="#1d1d1b" />
                    <path d="M8 8L20 20M20 20L32 32M20 20L32 8M20 20L8 32" stroke="#ffffff" />
                    <rect x="0.5" y="0.5" width="39" height="39" stroke="#1d1d1b" />
                </svg>
            </button>
        </div>
    <?php endif ?>
</div>