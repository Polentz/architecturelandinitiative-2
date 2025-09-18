<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <?php if ($page->children()->count() >= 1) : ?>
        <section class="scroll-layout scroll-y">
            <div class="scroll-container">
                <div class="scroll-items column-direction">
                    <?php foreach ($page->children()->listed() as $child) : ?>
                        <?php $cover = $child->background()->toFile() ?>
                        <div class="item scroll-item<?= $cover ? ' has-background' : '' ?>">
                            <?php if ($cover) : ?>
                                <div class="item-background">
                                    <img src="<?= $cover->resize(1600, null)->url() ?>">
                                </div>
                            <?php endif ?>
                            <h3 class="item-title"><a href="<?= $child->url() ?>"><?= $child->title() ?></a></h3>
                        </div>
                    <?php endforeach ?>
                    <?php foreach ($page->children()->unlisted() as $child) : ?>
                        <?php $cover = $child->background()->toFile() ?>
                        <div class="item scroll-item<?= $cover ? ' has-background unlisted' : '' ?>" <?= $cover ? ' style="background-image: url(\'' . $cover->resize(1600, null)->url() . '\');"' : '' ?>>
                            <span class="item-title-label text-label">What's next:</span>
                            <h3 class="item-title">
                                <p><?= $child->title() ?></p>
                            </h3>
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