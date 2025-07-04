<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <section class="gallery grid items-container">
        <?php foreach ($allmedia->filterBy('tools', '*=', $page->title()) as $media) : ?>
            <?php snippet('gallery', ['media' => $media], slots: true) ?>
            <?php slot('showProject') ?>
            <?php endslot() ?>
            <?php endsnippet() ?>
        <?php endforeach ?>
    </section>
    <?= snippet('filters') ?>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>