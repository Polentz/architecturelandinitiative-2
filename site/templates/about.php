<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?php snippet('intro', slots: true) ?>
    <?= slot('aboutPage') ?>
    <?php endslot() ?>
    <?php endsnippet() ?>
</main>

<?= snippet('footer') ?>
<?= snippet('foot') ?>