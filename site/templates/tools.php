<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <?php if ($page->children()->count() >= 1) : ?>
        <section class="scroll-layout scroll-x">
            <div class="scroll-container">
                <div class="scroll-items row-direction">
                    <?php foreach ($page->children()->listed() as $child) : ?>
                        <?php $cover = $child->background()->toFile() ?>

                        <div class="item scroll-item<?= $cover ? ' has-background' : '' ?>" <?= $cover ? ' style="background-image: url(\'' . $cover->resize(1600, null)->url() . '\');"' : '' ?>>
                            <h3 class="item-title"><a href="<?= $child->url() ?>"><?= $child->title() ?></a></h3>
                        </div>

                    <?php endforeach ?>
                </div>
            </div>
        </section>
    <?php endif ?>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>