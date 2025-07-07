<div class="text-block">
    <div class="text-label">
        <p><?= $block->subtitle() ?></p>
    </div>
    <div class="text">
        <?= $block->copy()->kt() ?>
        <?php if ($thumbnail = $block->thumbnail()->toFile()) : ?>
            <figure class="thumbnail">
                <img src="<?= $thumbnail->url() ?>" width="100%" />
            </figure>
        <?php endif ?>
    </div>
</div>