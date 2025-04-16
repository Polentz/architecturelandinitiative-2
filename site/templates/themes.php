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
    <section class="marquee-layout scroll-y">
        <?php foreach ($themes->listed() as $theme) : ?> 
            <?php if ($theme) : ?>
                <div class="marquee-layout-item">
                    <h2 class="item-title">
                        <a data-name="<?= $theme->title() ?>" href="<?= $theme->url() ?>"></a>
                    </h2>
                </div>
            <?php endif ?>
        <?php endforeach ?>
        <?php foreach ($themes->unlisted() as $theme) : ?> 
            <?php if ($theme) : ?>
                <div class="marquee-layout-item">
                    <h2 class="item-title">
                        <p data-name="<?= $theme->title() ?>" href="<?= $theme->url() ?>"></p>
                    </h2>
                </div>
            <?php endif ?>
        <?php endforeach ?>
    </section>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>