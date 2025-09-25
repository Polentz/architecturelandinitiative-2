<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <?= snippet('cover') ?>

    <?php if (!empty($galleryFiles)) : ?>
        <?php if (!empty($categories) || $page->selectFilters()->isNotEmpty()) : ?>
            <section class="inner-menu">
                <?php snippet('categories') ?>
                <?php snippet('filters', slots: true) ?>
                <?= slot('projectFilters') ?>
                <?php endslot() ?>
                <?php endsnippet() ?>
            </section>
        <?php endif ?>
        <?= snippet('gallery') ?>
    <?php endif ?>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>