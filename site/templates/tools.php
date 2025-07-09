<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <?php if ($page->children()->count() >= 1) : ?>
        <section class="scroll-layout scroll-x">
            <div class="scroll-container">
                <div class="scroll-items row-direction">
                    <?php foreach ($page->children()->listed() as $child) : ?>
                        <?php if ($child) : ?>
                            <div class="item scroll-item" <?php if ($cover = $child->background()->toFile()) : ?> style="background-image: url('<?= $cover->url() ?>');" <?php endif ?>>
                                <h3 class="item-title"><a href="<?= $child->url() ?>"><?= $child->title() ?></a></h3>
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