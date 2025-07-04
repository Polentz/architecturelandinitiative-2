<?php

use Kirby\Toolkit\Str;

$selectFiltersOptions = $page->blueprint()->field('selectFilters')['options'] ?? [];
?>

<div id="filters" class="filters">
    <div class="buttons-wrapper">
        <button class="ui-button top-button" type="button">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.5" width="39" height="39" fill="#1d1d1b" />
                <path d="M20 8L30 19.25M20 8L10 19.25M20 8L20 32" stroke="#ffffff" />
            </svg>
        </button>
        <?php if ($page->selectFilters()->isNotEmpty()) : ?>
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

    <div class="filters-wrapper">
        <?php foreach ($page->selectFilters()->split() as $filter) : ?>
            <div class="filter-header text">
                <p>Filter by <?= strtolower($selectFiltersOptions[$filter] ?? $filter) ?></p>
            </div>
            <div class="filter-list text-label">
                <?php foreach ($page->gallery()->toFiles()->pluck($filter, ',', true) as $type) : ?>
                    <li id="<?= Str::slug($type) ?>" class="filter" data-type="<?= Str::slug($type) ?>"><?= $type ?></li>
                <?php endforeach ?>
            </div>
        <?php endforeach ?>
        <div class="filter-deselect text-label">
            <span>All</span>
        </div>
        <button class="ui-button x-button" type="button">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.5" width="39" height="39" fill="#1d1d1b" />
                <path d="M8 8L20 20M20 20L32 32M20 20L32 8M20 20L8 32" stroke="#ffffff" />
                <rect x="0.5" y="0.5" width="39" height="39" stroke="#1d1d1b" />
            </svg>
        </button>
    </div>
</div>