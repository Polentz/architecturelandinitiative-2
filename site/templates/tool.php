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
        <?php foreach ($allmedia->filterBy('tools', '*=', $page->title())->shuffle() as $media) : ?>
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