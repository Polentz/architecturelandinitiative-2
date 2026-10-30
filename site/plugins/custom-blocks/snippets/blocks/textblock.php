<div class="text-block">
    <?php if ($block->subtitle()->isNotEmpty()): ?>
        <div class="text-label">
            <p><?= $block->subtitle() ?></p>
        </div>
        <?php if ($block->copy()->isNotEmpty()): ?>
            <div class="text-subtext">
                <?= $block->copy()->kt() ?>
                <?php if ($thumbnail = $block->thumbnail()->toFile()): ?>
                    <figure class="thumbnail">
                        <?= snippet('image', ['media' => $thumbnail]) ?>
                    </figure>
                <?php endif ?>
            </div>
        <?php endif ?>
    <?php elseif ($block->subtitle()->isEmpty()): ?>
        <?php if ($block->copy()->isNotEmpty()): ?>
            <div class="text">
                <?= $block->copy()->kt() ?>
                <?php if ($thumbnail = $block->thumbnail()->toFile()): ?>
                    <figure class="thumbnail">
                        <?= snippet('image', ['media' => $thumbnail]) ?>
                    </figure>
                <?php endif ?>
            </div>
        <?php endif ?>
    <?php endif ?>
</div>