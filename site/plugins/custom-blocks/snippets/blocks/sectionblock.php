<div class="slider-block">
    <?php if ($block->title()->isNotEmpty()) : ?>
        <div class="slider-block-title">
            <h2><?= $block->title() ?></h2>
        </div>
    <?php endif ?>
    <?php if ($block->copy()->isNotEmpty()) : ?>
        <div class="slider-block-text">
            <?php if ($block->subtitle()->isNotEmpty()) : ?>
                <div class="text-label">
                    <p><?= $block->subtitle() ?></p>
                </div>
            <?php endif ?>
            <div class="text">
                <?= $block->copy()->kt() ?>
            </div>
        </div>
    <?php endif ?>
</div>