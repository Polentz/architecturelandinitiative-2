<div class="accordion" data-date="<?= $block->date() ?>" data-type="<?= $block->typology()->slug() ?>" data-project="<?= $block->project()->slug() ?>" data-members="<?= $block->members() ?>">
    <ul class="accordion-topbar accordion-opener">
        <li class="accordion-topbar-item text-subtext"><?= $block->title() ?></li>
        <li class="accordion-topbar-item text-label"><?= $block->eventdate() ?></li>
        <li class="accordion-topbar-item text-label"><?= $block->typology() ?></li>
        <?php if ($block->where()->isNotEmpty()) : ?>
            <li class="accordion-topbar-item text-label"><?= $block->where() ?></li>
        <?php else : ?>
            <li class="accordion-topbar-item text-label">-</li>
        <?php endif ?>
        <?php if ($block->project()->isNotEmpty()) : ?>
            <li class="accordion-topbar-item text-label"><?= $block->project() ?></li>
        <?php else : ?>
            <li class="accordion-topbar-item text-label">-</li>
        <?php endif ?>
    </ul>
    <ul class="accordion-items">
        <li class="accordion-content">
            <div class="accordion-text">
                <div class="accordion-title">
                    <h3 class="title"><?= $block->title() ?></h3>
                    <?php if ($block->subtitle()->isNotEmpty()) : ?>
                        <p class="text"><?= $block->subtitle() ?></p>
                    <?php endif ?>
                </div>
                <?php if ($block->body()->isNotEmpty()) : ?>
                    <div class="accordion-text--block text">
                        <?= $block->body()->kt() ?>
                    </div>
                <?php endif ?>
                <?php if ($block->credits()->isNotEmpty()) : ?>
                    <div class="accordion-text--block text-caption">
                        <?= $block->credits()->kt() ?>
                    </div>
                <?php endif ?>
                <?php if ($block->info()->isNotEmpty()) : ?>
                    <div class="accordion-text--block text-subtext">
                        <?= $block->info()->kt() ?>
                    </div>
                <?php endif ?>
            </div>
        </li>
        <?php if ($image = $block->image()->toFile()) : ?>
            <li class="accordion-image">
                <figure class="accordion-image-wrapper">
                    <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
                    <?php if ($block->imagecaption()->isNotEmpty()) : ?>
                        <figcaption class="text-label"><?= $block->imagecaption()->kt() ?></figcaption>
                    <?php endif ?>
                </figure>
            </li>
        <?php endif ?>
    </ul>
</div>