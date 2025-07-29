<?php
$coverFiles = $page->cover()->toFiles();
?>

<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <section class="cover" <?php if ($coverFiles->count() == 1) : ?>style="grid-template-columns: 1fr;" <?php endif ?>>
        <?php foreach ($coverFiles as $media) : ?>
            <?= snippet('cover', ['media' => $media]) ?>
        <?php endforeach ?>
    </section>

    <section class="gallery grid items-container">
        <?php foreach ($page->gallery()->toFiles() as $media) : ?>
            <?= snippet('gallery', ['media' => $media]) ?>
        <?php endforeach ?>
    </section>
</main>

<?php snippet('filters', slots: true) ?>
<?= slot('toolFilters') ?>
<?php endslot() ?>
<?php endsnippet() ?>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>