<?php if ($block->copy()->isNotEmpty()) : ?>
    <div class="intro-block grid">
        <?php if ($block->subtitle()->isNotEmpty()) : ?>
            <div class="intro-subtitle text-label">
                <p><?= $block->subtitle() ?></p>
            </div>
        <?php endif ?>
        <div class="intro-copy text">
            <?= $block->copy()->kt() ?>
        </div>
    </div>
<?php endif ?>