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
    <section class="cover-layout scroll-x">    
        <div class="scroll-container">
            <div class="scroll-items">
                <?php foreach ($tools->listed() as $tool) : ?> 
                    <?php if ($tool) : ?>
                        <div class="grid-layout-item scroll-item" <?php if ($cover = $tool->background()->toFile()) : ?>style="background-image: url('<?= $cover->url() ?>');"<?php endif ?>>
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
