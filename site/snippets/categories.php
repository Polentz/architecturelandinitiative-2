<?php

use Kirby\Toolkit\Str;

$allCategories = site()->categories()->toStructure();

$categories = [];
foreach ($page->gallery()->toFiles() as $file) {
    $key = $file->category()->value();
    $categories[] = $key;
}
$categories = array_unique($categories);

$categories = $allCategories->filter(function ($cat) use ($categories) {
    return in_array($cat->key()->value(), $categories);
});

// $categoryKey = null;
// $categoryLabel = null;
// foreach ($page->gallery()->toFiles() as $file) {
//     $categoryKey = $file->category()->value();
// }
// if ($categoryKey) {
//     $categoryItem = site()->categories()->toStructure()->findBy('key', $categoryKey);
//     if ($categoryItem) {
//         $categoryLabel = $categoryItem->filter();
//     }
// }

?>

<?php if (!empty($categories)) : ?>
    <div class="categories">
        <div class="categories-list">
            <button id="all" class="button category category-deselect --target">
                <span class="text-label"><?= t('all') ?></span>
            </button>
            <?php foreach ($categories as $category) : ?>
                <button id="<?= Str::slug($category->key()) ?>" class="button category">
                    <span class="text-label"><?= $category->filter() ?></span>
                </button>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>