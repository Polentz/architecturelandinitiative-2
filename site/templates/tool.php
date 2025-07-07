<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <section class="gallery grid items-container">
        <?php foreach ($allmedia->filterBy('tools', '*=', $page->title()) as $media) : ?>
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