<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="page-intro"> 
        <div class="intro-text">
            <?= $page->intro()->kt() ?>
        </div>
        <?= $page->blocks()->toBlocks() ?>
    </section>

    <section class="gallery grid">
        <?php foreach ($page->gallery()->toFiles()->shuffle() as $media) : ?>
            <?= snippet('gallery', ['media' => $media]) ?>
        <?php endforeach ?> 
    </section>

    <?= snippet('filters') ?>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>