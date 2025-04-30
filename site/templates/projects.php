<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="page-intro"> 
        <div class="intro-text">
            <?= $page->intro()->kt() ?>
        </div>
        <?= $page->blocks()->toBlocks() ?>
    </section>

    <section class="scroll-layout scroll-y">
        <div class="scroll-container">
            <div class="scroll-items column-direction">
                <?php foreach ($projects->listed() as $project) : ?> 
                    <?php if ($project) : ?>
                        <div class="item scroll-item" <?php if ($cover = $project->background()->toFile()) : ?>style="background-image: url('<?= $cover->url() ?>');"<?php endif ?>>
                            <h2 class="item-title"><a data-name="<?= $project->title() ?>" href="<?= $project->url() ?>"></a></h2>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
                <?php foreach ($projects->unlisted() as $project) : ?> 
                    <?php if ($project) : ?>
                        <div class="item scroll-item">
                            <span class="item-title-label text-label">What's next:</span>
                            <h2 class="item-title"><p data-name="<?= $project->title() ?>"></p></h2>
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