<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?php if ($page->intro()->isNotEmpty()) : ?>
        <section class="intro">
            <div class="intro-text">
                <h3><?= $page->intro() ?></h3>
            </div>
        </section>
    <?php endif ?>

    <section class="column-layout">
        <?= $page->blocks()->toBlocks()->sortBy('date', 'desc') ?>
    </section>
</main>

<div class="box-container">
    <?= snippet('filters') ?>
</div>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>


