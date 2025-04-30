<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="page-intro"> 
        <div class="intro-text">
            <?= $page->intro()->kt() ?>
        </div>
        <?= $page->blocks()->toBlocks() ?>
    </section>

    <section class="scroll-layout scroll-x">
        <div class="scroll-container">
            <div class="scroll-items row-direction">
                <?php foreach ($tools->listed() as $tool) : ?> 
                    <?php if ($tool) : ?>
                        <div class="item scroll-item" <?php if ($cover = $tool->background()->toFile()) : ?>style="background-image: url('<?= $cover->url() ?>');"<?php endif ?>>
                            <h2 class="item-title"><a data-name="<?= $tool->title() ?>" href="<?= $tool->url() ?>"></a></h2>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>