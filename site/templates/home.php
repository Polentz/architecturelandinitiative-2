<?= snippet('head') ?>
<?= snippet('header') ?>

<main class="main">
    <section class="page-intro">
        <div class="text-headline">
            <?= $page->intro()->kt() ?>
        </div>
    </section>
</main>
<section class="hero-layout">
    <?php foreach ($page->gallery()->toFiles()->shuffle()->limit(1) as $video) : ?>
        <video src="<?= $video->url() ?>" autoplay loop playsinline muted></video>
    <?php endforeach ?>
</section>

<?= snippet('footer') ?>
<?= snippet('foot') ?>