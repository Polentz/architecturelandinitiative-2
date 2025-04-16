<?php snippet('header', slots: true) ?>
    <?php slot('defaultHeader') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main">
    <?php if ($page->intro()->isNotEmpty()) : ?>
        <section class="intro">
            <div class="text-intro">
                <h3><?= $page->intro() ?></h3>
            </div>
        </section>
    <?php endif ?>

    <section class="gallery">
        <div class="gallery-grid">
            <?php foreach ($allmedia->filterBy('tools', '*=', $page->title())->shuffle() as $media) : ?>
                <?php snippet('gallery', ['media' => $media], slots: true) ?>
                    <?php slot('showProject') ?>
                    <?php endslot() ?>
                <?php endsnippet() ?>
            <?php endforeach ?> 
        </div>
    </section>
</main>

<div class="box-container">
    <?= snippet('filters') ?>
</div>

<div class="zoomed-container">
    <button class="button zoomed-button" type="button">
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 8L20 20M20 20L32 32M20 20L32 8M20 20L8 32" stroke="#1d1d1b"/>
        </svg>
    </button>
</div>

<?= snippet('slider') ?>
<?= snippet('footer') ?>