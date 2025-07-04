<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="page-intro">
        <div class="text">
            <?= $page->intro()->kt() ?>
        </div>
        <?= $site->blocks()->toBlocks() ?>
    </section>
</main>

<?= snippet('footer') ?>
<?= snippet('foot') ?>