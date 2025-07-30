<?php if ($media->type() == 'image') : ?>
    <figure class="cover-item image-item" data-type="<?= $media->mediatype()->slug() ?>" data-category="<?= $media->filter()->slug() ?>" data-project="<?= $media->parent()->slug() ?>">
        <img class="image lazy" src="" data-src="<?= $media->resize(1800, null)->url() ?>" alt="<?= $media->alt() ?>" />
        <figcaption class="cover-item-caption text-label">
            <?= $media->caption()->kt() ?>
        </figcaption>
    </figure>
<?php endif ?>

<?php if ($media->type() == 'video') : ?>
    <figure class="cover-item video-item" data-type="<?= $media->mediatype()->slug() ?>" data-category="<?= $media->filter()->slug() ?>" data-project="<?= $media->parent()->slug() ?>">
        <video src="<?= $media->url() ?>" autoplay muted loop controlslist="noplaybackrate nodownload" disablePictureInPicture type="video"></video>
        <figcaption class="cover-item-caption text-label">
            <?= $media->caption()->kt() ?>
        </figcaption>
    </figure>
<?php endif ?>