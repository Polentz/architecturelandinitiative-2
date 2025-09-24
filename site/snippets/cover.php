<?php
$coverFiles = $page->cover()->toFiles();
?>

<?php if ($coverFiles->isNotEmpty()) : ?>
    <section class="cover" <?php if ($coverFiles->count() == 1) : ?>style="grid-template-columns: 1fr;" <?php endif ?>>
        <?php foreach ($coverFiles as $media) : ?>
            <?php if ($media->type() == 'image') : ?>
                <figure class="cover-item image-item">
                    <img class="image lazy" src="" data-src="<?= $media->resize(1800, null)->url() ?>" alt="<?= $media->alt() ?>" />
                    <figcaption class="cover-item-caption text-label">
                        <?= $media->caption()->kt() ?>
                    </figcaption>
                </figure>
            <?php endif ?>

            <?php if ($media->type() == 'video') : ?>
                <figure class="cover-item video-item">
                    <video class="video lazy" src="" data-src="<?= $media->url() ?>" autoplay muted loop controlslist="noplaybackrate nodownload" disablePictureInPicture type="video"></video>
                    <figcaption class="cover-item-caption text-label">
                        <?= $media->caption()->kt() ?>
                    </figcaption>
                </figure>
            <?php endif ?>
        <?php endforeach ?>
    </section>
<?php endif ?>