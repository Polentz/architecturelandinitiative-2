<?php

use Kirby\Toolkit\Str;

?>

<?php if (!empty($categories)) : ?>
    <div class="categories">
        <div class="categories-list">
            <button id="all" class="button category category-deselect --target">
                <span class="text-label"><?= t('all') ?></span>
            </button>
            <?php foreach ($categories as $category) : ?>
                <button id="<?= Str::slug($category) ?>" class="button category">
                    <span class="text-label"><?= $category ?></span>
                </button>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>