<?php if($block->date()->toDate() > time()) : ?>
    <div class="accordion --ongoing" data-type="<?= $block->typology()->slug() ?>" data-category="<?= $block->project()->slug() ?>">
        <div class="accordion-wrapper">
            <ul class="accordion-topbar">
                <li class="accordion-topbar-item topbar-date text-label"><?= $block->eventdate() ?></li>
                <li class="accordion-topbar-item text-label"><?= $type ?> <?= $block->typology() ?></li>
                <?php if ($block->where()->isNotEmpty()) : ?>
                    <li class="accordion-topbar-item text-label"><?= $where ?> <?= $block->where() ?></li>
                <?php else : ?>
                    <li class="accordion-topbar-item text-label"><?= $where ?> -</li>
                <?php endif ?>
                <?php if ($block->project()->isNotEmpty()) : ?>
                    <li class="accordion-topbar-item text-label"><?= $project ?> <?= $block->project() ?></li>
                <?php else : ?>
                    <li class="accordion-topbar-item text-label"><?= $project ?> -</li>
                <?php endif ?>
            </ul>
            <ul class="accordion-items">
                <li class="accordion-content">    
                    <div class="accordion-title">            
                        <h3><?= $block->title() ?></h3>
                        <?php if ( $block->subtitle()->isNotEmpty()) : ?>
                            <p class="text"><?= $block->subtitle() ?></p>
                        <?php endif ?>  
                    </div>
                    <div class="accordion-text">
                        <?php if ($block->body()->isNotEmpty()) : ?>
                            <div class="accordion-text-block text">
                                <?= $block->body()->kt() ?>
                            </div>
                        <?php endif ?>
                        <?php if ($block->credits()->isNotEmpty()) : ?>
                            <div class="accordion-text-block text-caption">
                                <?= $block->credits()->kt() ?>
                            </div>
                        <?php endif ?>
                        <?php if ($block->info()->isNotEmpty()) : ?>
                            <div class="accordion-text-block text-subtext">
                                <?= $block->info()->kt() ?>
                            </div>
                        <?php endif ?>
                    </div>
                </li>
                <?php if ($image = $block->image()->toFile()) : ?>
                    <li class="accordion-image">
                        <figure class="accordion-image-wrapper">
                            <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
                            <figcaption class="text-label"><?= $block->imagecaption()->kt() ?></figcaption>
                        </figure>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
<?php elseif ($block->date()->toDate() < time()) : ?>
    <div class="accordion --past" data-type="<?= $block->typology()->slug() ?>" data-category="<?= $block->project()->slug() ?>">
        <div class="accordion-wrapper">
            <ul class="accordion-topbar">
                <li class="accordion-topbar-title text-subtext"><?= $block->title() ?></li>
                <li class="accordion-topbar-item topbar-date text-label"><?= $block->eventdate() ?></li>
                <li class="accordion-topbar-item text-label"><?= $type ?> <?= $block->typology() ?></li>
                <?php if ($block->where()->isNotEmpty()) : ?>
                    <li class="accordion-topbar-item text-label"><?= $where ?> <?= $block->where() ?></li>
                <?php else : ?>
                    <li class="accordion-topbar-item text-label"><?= $where ?> -</li>
                <?php endif ?>
                <?php if ($block->project()->isNotEmpty()) : ?>
                    <li class="accordion-topbar-item text-label"><?= $project ?> <?= $block->project() ?></li>
                <?php else : ?>
                    <li class="accordion-topbar-item text-label"><?= $project ?> -</li>
                <?php endif ?>
            </ul>
            <ul class="accordion-items">
                <li class="accordion-content">    
                    <div class="accordion-text">
                        <div class="accordion-title">            
                            <h3><?= $block->title() ?></h3>
                            <?php if ( $block->subtitle()->isNotEmpty()) : ?>
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
                            <figcaption class="text-label"><?= $block->imagecaption()->kt() ?></figcaption>
                        </figure>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
<?php endif ?>



