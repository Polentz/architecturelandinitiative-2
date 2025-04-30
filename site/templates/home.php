<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="page-intro --blend"> 
        <div class="intro-text">
            <?= $page->intro()->kt() ?>
        </div>
        <?= $page->blocks()->toBlocks() ?>
    </section>
    
    <section class="hero-layout">
        <?php foreach ($page->gallery()->toFiles()->shuffle()->limit(1) as $video) : ?>
            <video src="<?= $video->url() ?>" autoplay loop playsinline muted></video>
        <?php endforeach ?>
    </section>
</main>

<?= snippet('slider') ?>
<?= snippet('footer') ?>
<?= snippet('foot') ?>