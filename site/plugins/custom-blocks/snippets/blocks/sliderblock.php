<div class="slider-block">
    <?php if ($block->subtitle()->isNotEmpty()) : ?>
        <div class="text-label">
            <p><?= $block->subtitle() ?></p>
        </div>
    <?php endif ?>
    <?php if ($block->copy()->isNotEmpty()) : ?>
        <div class="text">
            <?= $block->copy()->kt() ?>
            <?php if ($thumbnail = $block->thumbnail()->toFile()) : ?>
                <figure class="thumbnail">
                    <img src="<?= $thumbnail->resize(1200, null)->url() ?>" width="100%" />
                </figure>
            <?php endif ?>
        </div>
    <?php endif ?>
</div>