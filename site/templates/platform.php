<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <?= snippet('intro') ?>

    <section class="inner-menu">
        <div class="sortable">
            <div class="sortable-list">
                <button class="button sort --disabled">
                    <span class="text-label"><?= t('sort-by') ?></span>
                </button>

                <button class="button sort --target" data-item="date">
                    <span class="text-label"><?= t('topbar.date') ?></span>
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L7 9L1 1" />
                    </svg>
                </button>

                <button class="button sort" data-item="title">
                    <span class="text-label"><?= t('topbar.title') ?></span>
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L7 9L1 1" />
                    </svg>
                </button>

                <button class="button sort" data-item="type">
                    <span class="text-label"><?= t('topbar.type') ?></span>
                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L7 9L1 1" />
                    </svg>
                </button>
            </div>
        </div>
        <?php snippet('filters', slots: true) ?>
        <?= slot('platformFilters') ?>
        <?php endslot() ?>
        <?php endsnippet() ?>
    </section>

    <section class="list-layout items-container">
        <ul class="accordion-topbar accordion-labels">
            <li class="accordion-topbar-item text-label">
                <span><?= t('topbar.title') ?></span>
            </li>
            <li class="accordion-topbar-item text-label">
                <span><?= t('topbar.date') ?></span>
            </li>
            <li class="accordion-topbar-item text-label">
                <span><?= t('topbar.type') ?></span>
            </li>
            <li class="accordion-topbar-item text-label">
                <span><?= t('topbar.where') ?></span>
            </li>
            <li class="accordion-topbar-item text-label">
                <span><?= t('topbar.project') ?></span>
            </li>
        </ul>
        <div class="accordion-list">
            <?= $page->blocks()->toBlocks()->sortBy('date', 'desc') ?>
        </div>
    </section>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>