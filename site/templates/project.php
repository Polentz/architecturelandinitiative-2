<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <?= snippet('cover') ?>

    <section class="inner-menu">
        <?php snippet('categories') ?>
        <?php snippet('filters', slots: true) ?>
        <?= slot('projectFilters') ?>
        <?php endslot() ?>
        <?php endsnippet() ?>
    </section>

    <?= snippet('gallery') ?>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>