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
    
    <section class="list-layout">
        <?= $page->blocks()->toBlocks()->sortBy('date', 'desc') ?>
    </section>
</main>

<div class="box-container">
    <?= snippet('filters') ?>
</div>

<?= snippet('slider') ?>
<?= snippet('footer') ?>


