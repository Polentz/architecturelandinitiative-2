<?php

use Kirby\Toolkit\Str;

$pageFiles = $page->gallery()->toFiles();

$categories = [];
foreach ($pageFiles as $file) {
    $category = $file->category();
    $categories[] = $category;
}

$categories = array_unique($categories);

?>

<div class="categories">
    <div class="categories-list">
        <button id="all" class="button category category-deselect --target">
            <span class="text-label"><?= t('all') ?></span>
        </button>
        <?php foreach ($categories as $category) : ?>
            <?php if ($category->isNotEmpty()) : ?>
                <button id="<?= Str::slug($category) ?>" class="button category">
                    <span class="text-label"><?= $category ?></span>
                </button>
            <?php endif ?>
        <?php endforeach ?>
    </div>
</div>