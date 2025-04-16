<?php snippet('header', slots: true) ?>
    <?php slot('pathsHeader') ?>
    <?php endslot() ?>
<?php endsnippet() ?>

<main class="main">
    <section class="page-intro"> 
        <div class="text-intro --blend">
            <h3><?= $page->intro() ?></h3>        
        </div>
    </section>
    <section class="hero-layout">
        <video src="https://css-tricks-post-videos.s3.us-east-1.amazonaws.com/blurry-trees.mov" autoplay loop playsinline muted></video>
    </section>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>