<?php

$coverFiles = $page->cover()->toFiles();
$pageFiles = $page->gallery()->toFiles();

?>

<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <?php if ($coverFiles->count() > 0) : ?>
        <section class="cover" <?php if ($coverFiles->count() == 1) : ?>style="grid-template-columns: 1fr;" <?php endif ?>>
            <?php foreach ($coverFiles as $media) : ?>
                <?= snippet('cover', ['media' => $media]) ?>
            <?php endforeach ?>
        </section>
    <?php endif ?>

    <section class="inner-menu">
        <?php snippet('categories') ?>
        <?php snippet('filters', slots: true) ?>
        <?= slot('projectFilters') ?>
        <?php endslot() ?>
        <?php endsnippet() ?>
    </section>

    <section class="gallery grid items-container">
        <?php foreach ($pageFiles as $media) : ?>
            <?= snippet('gallery', ['media' => $media]) ?>
        <?php endforeach ?>
    </section>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>