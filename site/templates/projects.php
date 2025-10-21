<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <?php if ($page->toggleCategories()->isTrue()) : ?>
        <section class="inner-menu">
            <div class="sortby">
                <div class="sortby-list">
                    <button class="button sort --disabled">
                        <span class="text-label"><?= t('sort-by') ?></span>
                    </button>
                    <button class="button sort  --target" data-item="num">
                        <span class="text-label"><?= t('sort-by.date') ?></span>
                        <svg class="--asc" width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 1L7 9L1 1" />
                        </svg>
                    </button>
                    <button class="button sort" data-item="title">
                        <span class="text-label"><?= t('sort-by.title') ?></span>
                        <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13 1L7 9L1 1" />
                        </svg>
                    </button>
                </div>
            </div>
            <?php snippet('filters', slots: true) ?>
            <?= slot('itemtypes') ?>
            <?php endslot() ?>
            <?php endsnippet() ?>
        </section>
    <?php endif ?>

    <?php if ($page->children()->count() >= 1) : ?>
        <section class="scroll-layout scroll-y">
            <div class="scroll-container">
                <div class="scroll-items column-direction">
                    <?php foreach ($page->children()->listed() as $child) : ?>
                        <?php $cover = $child->background()->toFile() ?>
                        <div class="item scroll-item<?= $cover ? ' has-background' : '' ?> sortable" data-title="<?= $child->title()->slug() ?>" data-num="<?= $child->num() ?>">
                            <?php if ($cover) : ?>
                                <div class="item-background">
                                    <img class="image lazy" src="" data-src="<?= $cover->resize(1600, null)->url() ?>" alt="<?= $cover->alt() ?>">
                                </div>
                            <?php endif ?>
                            <h3 class="item-title"><a href="<?= $child->url() ?>"><?= $child->title() ?></a></h3>
                        </div>
                    <?php endforeach ?>
                    <?php foreach ($page->children()->unlisted() as $child) : ?>
                        <div class="item scroll-item sortable" data-title="<?= $child->title()->slug() ?>" data-num="99999">
                            <span class="item-title-label text-label"><?= t('upcoming') ?></span>
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