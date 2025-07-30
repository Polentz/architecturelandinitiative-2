<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?php snippet('intro', slots: true) ?>
    <?= slot('aboutPage') ?>
    <?php endslot() ?>
    <?php endsnippet() ?>
    <section class="page-text">
        <?php if ($page->body()->toBlocks()->count() >= 1) : ?>
            <?= $page->body()->toBlocks() ?>
        <?php endif ?>
    </section>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>