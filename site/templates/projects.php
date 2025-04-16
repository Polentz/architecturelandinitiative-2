<?php snippet('header', slots: true) ?>
    <?php slot('pathsHeader') ?>
    <?php endslot() ?>
<?php endsnippet() ?>


<main class="main">
    <section class="page-intro">    
        <div class="text-intro">
            <h3><?= $page->intro() ?></h3>
        </div>
    </section>
    <section class="grid-layout scroll-x">
        <div class="scroll-container">
            <div class="scroll-items">
                <?php foreach ($projects->listed() as $project) : ?> 
                    <?php if ($project) : ?>
                        <div class="grid-layout-item scroll-item">
                            <h2 class="item-title"><a data-name="<?= $project->title() ?>" href="<?= $project->url() ?>"></a></h2>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
                <?php foreach ($projects->unlisted() as $project) : ?> 
                    <?php if ($project) : ?>
                        <div class="grid-layout-item scroll-item">
                            <span class="item-title-label text-label">What's next</span>
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