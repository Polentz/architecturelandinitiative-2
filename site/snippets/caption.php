<figcaption class="gallery-item-caption">
    <div class="text-label">
        <?php if ($media->mediatype()->isNotEmpty()): ?>
            <p>Media type: <?= $media->mediatype() ?></p>
        <?php endif ?>
        <?php if ($media->filter()->isNotEmpty()): ?>
            <p>Process stage: <?= $media->filter() ?></p>
        <?php endif ?>
        <?php if ($slots->showProject()): ?>
            <p>Project: <a href="<?= $media->parent()->url() ?>"><?= $media->parent()->title() ?></a></p>
        <?php endif ?>
    </div>
    <?php if ($media->caption()->isNotEmpty()) : ?>
        <hr>
        <div class="text-label">
            <?= $media->caption()->kt() ?>
        </div>
    <?php endif ?>
    <?php if ($media->info()->isNotEmpty()): ?>
        <div class="caption-text text">
            <?= $media->info()->kt() ?>
        </div>
    <?php endif ?>
</figcaption>