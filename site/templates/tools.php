<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="page-intro">
        <div class="text">
            <?= $page->intro()->kt() ?>
        </div>
        <?= $page->blocks()->toBlocks() ?>
    </section>

    <?php if ($page->children()->count() >= 1) : ?>
        <section class="scroll-layout scroll-x">
            <div class="scroll-container">
                <div class="scroll-items row-direction">
                    <?php foreach ($page->children()->listed() as $child) : ?>
                        <?php if ($child) : ?>
                            <div class="item scroll-item" <?php if ($cover = $child->background()->toFile()) : ?> style="background-image: url('<?= $cover->url() ?>');" <?php endif ?>>
                                <h2 class="item-title"><a data-name="<?= $child->title() ?>" href="<?= $child->url() ?>"></a></h2>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
    <?php endif ?>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>