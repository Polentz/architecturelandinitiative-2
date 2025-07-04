<?= snippet('head') ?>
<?= snippet('header') ?>

<!-- PROBLEMA QUI: STESSO NOME PER I BLOCKS DEL TESTO E DELLA TIMELINE -->
<main class="main">
    <?= snippet('intro') ?>

    <section class="list-layout items-container">
        <ul class="accordion-topbar accordion-labels">
            <li class="accordion-topbar-item text-label">
                <span>TITLE</span>
            </li>
            <li class="accordion-topbar-item text-label" data-item="date">
                <span>Sort by: DATE</span>
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L7 9L1 1" stroke="#1D1D1B" />
                </svg>
            </li>
            <li class="accordion-topbar-item text-label" data-item="type">
                <span>Sort by: TYPE</span>
                <svg width="14" height="10" viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 1L7 9L1 1" stroke="#1D1D1B" />
                </svg>
            </li>
            <li class="accordion-topbar-item text-label">
                <span>WHERE</span>
            </li>
            <li class="accordion-topbar-item text-label">
                <span>PROJECT</span>
            </li>
        </ul>
        <div class="accordion-list">
            <?= $page->blocks()->toBlocks()->sortBy('date', 'desc') ?>
        </div>
    </section>
    <?= snippet('filters') ?>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>